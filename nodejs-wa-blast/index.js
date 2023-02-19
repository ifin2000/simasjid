const {
    default: makeWASocket,
	MessageType, 
    MessageOptions, 
    Mimetype,
	DisconnectReason,
    useSingleFileAuthState
} =require("@adiwajshing/baileys");

//const { Boom } =require("@hapi/boom");  // tambahan bot
const {state, saveState} = useSingleFileAuthState("./auth_info.json");

const path = require('path');
const fs= require('fs');

const express = require("express");
const fileUpload = require('express-fileupload');
const cors = require('cors');
const bodyParser = require('body-parser');
const app = express();
//const axios = require("axios");     // tambahan bot

// enable files upload
app.use(fileUpload({
    createParentPath: true
}));

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: true}));

const server = require("http").createServer(app);
const io = require("socket.io")(server);
const port = process.env.PORT || 8081;
const qrcode = require("qrcode");

app.use("/assets", express.static(__dirname + "/client/assets"));

app.get("/scan", (req, res) => {
  res.sendFile("./client/server.html", {
    root: __dirname,
  });
});

app.get("/", (req, res) => {
  res.sendFile("./client/index.html", {
    root: __dirname,
  });
});

let sock;
let qr;
let soket;


const connectToWhatsApp = async () => {

    sock = makeWASocket( {
         printQRInTerminal: true,
         auth: state,
         browser: ["support_pasby", "Chrome", "1.0"],
     });
    
    sock.ev.on('connection.update', async(update) => {
        
        const { connection} = update;
        if(connection === 'close') {
            let pathqrloginfile = "./auth_info.json";
            let fileexist = fs.existsSync(pathqrloginfile); 
            if (fileexist) {
                fs.unlink(pathqrloginfile, (err) => {
                    if (err && err.code == "ENOENT") {
                        // file doens't exist
                        console.info("File doesn't exist, won't remove it.");
                    } else if (err) {
                        console.error("Error occurred while trying to remove file.");
                    }
                    console.log('File deleted!');
                });
            }
        }

        let statusCode = update.lastDisconnect?.error?.output?.statusCode;
        let msg = update.lastDisconnect?.error?.output?.payload?.message;
        //console.log(update);
        
        // if error 
        if (update.lastDisconnect?.error?.toString() === "Error: Unexpected server response: 400") {
            // console.log("Error, please restart the app!")
            setTimeout(() => {
                connectToWhatsApp();
            }, 3000);
        }
        else
        {
            switch (statusCode) {
                case DisconnectReason.restartRequired:
                    connectToWhatsApp();
                    updateQR("connected");
                break;
                case DisconnectReason.timedOut:
                    console.log("QR Timeout. Trying again...");
                    connectToWhatsApp();
                break;
                case DisconnectReason.multideviceMismatch:
                    console.log("Hmm. coba lagi...");
                    if (msg === "Require multi-device edition") {
                        connectToWhatsApp();
                        break;
                    }
                    connectToWhatsApp();
                break;
                default:
                    updateQR("connected");
                break;
            }
        }

        
        if (update.qr) 
        {
            qr = update.qr;
            updateQR("qr");
        }
        else if(qr = undefined)
        {
            updateQR("loading");
        }
        else
        {
            if (update.connection === "open") {
                updateQR("qrscanned");
                return;
            }
        }
      
    });

    /*sock.ev.on('connection.update', (update) => {
    	//console.log(update);
        const { connection, lastDisconnect } = update;
        if(connection === 'close') {
            const shouldReconnect = (lastDisconnect.error = Boom)?.output?.statusCode !== DisconnectReason.loggedOut;
            console.log('connection closed due to ', lastDisconnect.error, ', reconnecting ', shouldReconnect);
            // reconnect if not logged out
            if(shouldReconnect) {
                connectToWhatsApp();
            }
        } else if(connection === 'open') {
            console.log('opened connection');
        }
    });*/

    sock.ev.on("creds.update", saveState);

    // tambahan bot
    /*sock.ev.on("messages.upsert", async ({ messages, type }) => {
        
        //console.log(messages);
        
        if(type === "notify"){

            if(!messages[0].key.fromMe) {

                //tentukan jenis pesan berbentuk text                
                const pesan = messages[0].message.conversation;

                //tentukan jenis pesan apakah bentuk list
                const responseList = messages[0].message.listResponseMessage;
                
                //tentukan jenis pesan apakah bentuk button
                const responseButton = messages[0].message.buttonsResponseMessage;

                //tentukan jenis pesan apakah bentuk templateButtonReplyMessage
                //const responseReplyButton = messages[0].message.templateButtonReplyMessage;
                
                //nowa dari pengirim pesan sebagai id
                const noWa = messages[0].key.remoteJid;


                await sock.readMessages([messages[0].key]);

                //kecilkan semua pesan yang masuk lowercase 
                const pesanMasuk = pesan.toLowerCase();

                if(!messages[0].key.fromMe && pesanMasuk === "ping"){
                    await sock.sendMessage(noWa, {text: "Pong"},{quoted: messages[0] });
                }
                else if(!messages[0].key.fromMe && pesanMasuk === "btn") {
                    const buttons = [
                        {buttonId: "id1", buttonText: {displayText: 'Info 1!'}, type: 1},
                        {buttonId: "id2", buttonText: {displayText: 'Info 2!'}, type: 1},
                        {buttonId: "id3", buttonText: {displayText: '💵 Info 3'}, type: 1}
                    ]
                    const buttonInfo = {
                        text: "Info Warung Kopi",
                        buttons: buttons,
                        headerType: 1
                    }
                    await sock.sendMessage(noWa, buttonInfo, {quoted: messages[0]});
                    
                }
                else if(!messages[0].key.fromMe && responseButton){

                    //console.log(responseButton);
                    
                    if(responseButton.selectedButtonId == "id1"){
                        await sock.sendMessage(noWa, {
                            text:"anda memilih ID tombol ke 1"
                        });  
                    }else if(responseButton.selectedButtonId == "id2"){
                        await sock.sendMessage(noWa, {
                            text:"anda memilih ID tombol ke 2"
                        });  
                    }else if(responseButton.selectedButtonId == "id3"){
                        await sock.sendMessage(noWa, {
                            text:"anda memilih ID tombol ke 3"
                        });  
                    }
                    else{
                        await sock.sendMessage(noWa, {
                            text: "Pesan tombol invalid"
                        });
                    } 
                    
                }      
                else if(!messages[0].key.fromMe && pesanMasuk === "img") {
                    await sock.sendMessage(noWa, { 
                        image: {
                            url:"./image/KopiJahe.jpeg"
                        },
                        caption:"Ini Kopi Jahe"
                    });
                }
                else if(!messages[0].key.fromMe && pesanMasuk === "sound") {

                    textsound = capital("ini adalah pesan suara dari Robot Whastapp");

                    let API_URL = "https://texttospeech.responsivevoice.org/v1/text:synthesize?text="+textsound+"&lang=id&engine=g3&name=&pitch=0.5&rate=0.5&volume=1&key=0POmS5Y2&gender=male";
                    file = fs.createWriteStream("./sound.mp3");
                    const request = https.get(API_URL, async function(response) {
                        await response.pipe(file);
                        response.on("end",async function(){    
                            await sock.sendMessage(noWa, { 
                                audio: { 
                                    url: "sound.mp3",
                                    caption: textsound 
                                }, 
                                mimetype: 'audio/mp4'
                            });
                        });
                    });
                }
                else if(!messages[0].key.fromMe && pesanMasuk === "list") {

                    const jenismenu = [{
                            title : 'MAKANAN', 
                            rows :[
                                {
                                    title: "Nasi Goreng",
                                    rowId: '1'
                                }, 
                                {
                                    title: "Mie Goreng",
                                    rowId: '2'
                                },
                                {
                                    title: "Bakso Goreng",
                                    rowId: '3'
                                }
                            ]
                    },
                    {
                        title : 'MINUMAN', 
                        rows :[
                            {
                                title: "Kopi Jahe",
                                rowId: '4'
                            }, 
                            {
                                title: "Kopi Susu",
                                rowId: '5'
                            }
                        ]
                    }]

                    const listPesan = {
                        text: "Menu Pada Warung Kami",
                        title: "Daftar Menu",
                        buttonText: "Tampilakn Menu",
                        sections : jenismenu
                    }
                    
                    await sock.sendMessage(noWa, listPesan, {quoted: messages[0]});
                }              
                else if (!messages[0].key.fromMe && responseList){

                    //cek row id yang dipilih 
                    const pilihanlist = responseList.singleSelectReply.selectedRowId;
                    
                    if(pilihanlist == 1) {
                        await sock.sendMessage(noWa, { text: "Anda Memilih Item Makanan Nasi Goreng "});
                    }
                    else if (pilihanlist == 2) {
                        await sock.sendMessage(noWa, { text: "Anda Memilih Item Makanan Mie Goreng "});
                    }
                    else if (pilihanlist == 3) {
                        await sock.sendMessage(noWa, { text: "Anda Memilih Item Makanan Bakso Goreng "});
                    }
                    else if (pilihanlist == 4) {
                        await sock.sendMessage(noWa, { 
                            image: {
                                url:"./image/KopiJahe.jpeg"
                            },
                            caption:"Anda Memilih Item Minuman Kopi Jahe"
                        });
                    }
                    else if (pilihanlist == 5) {
                        await sock.sendMessage(noWa, { 
                            image: {
                                url:"./image/KopiSusu.jpeg"
                            },
                            caption:"Anda Memilih Item Minuman Kopi Susu"
                        });
                    }
                    else{
                        await sock.sendMessage(noWa, {text: "Pilihan Invalid!"},{quoted: messages[0] });
                    }    
                }
                else{
                    await sock.sendMessage(noWa, {text: "Saya adalah Bot!"},{quoted: messages[0] });
                }

            }

        }

    });*/
    
}

//jalankan konek whastaap server
connectToWhatsApp();

io.on("connection", async (socket) => {
    soket = socket;
    // console.log(sock)
    if (isConnected) {
        updateQR("connected");
    } else if (qr) {
        updateQR("qr");   
    }
});

// functions
const isConnected = () => {
    return (sock.user);
};

const updateQR = (data) => {
    switch (data) {
        case "qr":
            qrcode.toDataURL(qr, (err, url) => {
                soket?.emit("qr", url);
                soket?.emit("log", "QR Code received, please scan!");
            });
            break;
        case "connected":
            soket?.emit("qrstatus", "./assets/check.svg");
            soket?.emit("log", "WhatsApp terhubung!");
            break;
        case "qrscanned":
            soket?.emit("qrstatus", "./assets/check.svg");
            soket?.emit("log", "QR Code Telah discan!");
            break;
        case "loading":
            soket?.emit("qrstatus", "./assets/loader.gif");
            soket?.emit("log", "Registering QR Code , please wait!");
            break;
        default:
            break;
    }
};

let numberWA;

// cek status
app.post("/cekstatus", async (req, res) => {
    switch (req) {
        case "qr":
            qrcode.toDataURL(qr, (err, url) => {
                soket?.emit("qr", url);
                soket?.emit("log", "QR Code received, please scan!");            
            });
            res.status(200).json({
                status: true,
                response: 'QR Code received, please scan!'
            });
            break;
        case "connected":
            soket?.emit("qrstatus", "./assets/check.svg");
            soket?.emit("log", "WhatsApp terhubung!");
            res.status(200).json({
                status: true,
                response: 'WhatsApp terhubung!'
            });
            break;
        case "qrscanned":
            soket?.emit("qrstatus", "./assets/check.svg");
            soket?.emit("log", "QR Code Telah discan!");
            res.status(200).json({
                status: true,
                response: 'QR Code Telah discan!'
            });
            break;
        case "loading":
            soket?.emit("qrstatus", "./assets/loader.gif");
            soket?.emit("log", "Registering QR Code , please wait!");
            res.status(200).json({
                status: true,
                response: 'Registering QR Code , please wait!'
            });
            break;
        default:
            break;
    }
    
});

// send text message to wa user
app.post("/send-message", async (req, res) =>{
    //console.log(req);
    const pesankirim = req.body.message;
    const number = req.body.number;
    const fileDikirim = req.files;
    
    try {
        if(!req.files) 
        {
            if(!number) {
                 res.status(500).json({
                    status: false,
                    response: 'Nomor WA belum tidak disertakan!'
                });
            }
            else
            {
                //numberWA = '62' + number.substring(1) + "@s.whatsapp.net"; 
                numberWA = number + "@s.whatsapp.net";      // krn +62 ditambahkan di setwhatsappcontroller.php
                console.log(await sock.onWhatsApp(numberWA));
                if (isConnected) {
                    const exists = await sock.onWhatsApp(numberWA);
                    if (exists?.jid || (exists && exists[0]?.jid)) {
                        sock.sendMessage(exists.jid || exists[0].jid, { text: pesankirim })
                        .then((result) => {
                            res.status(200).json({
                                status: true,
                                response: result,
                            });
                        })
                        .catch((err) => {
                            res.status(500).json({
                                status: false,
                                response: err,
                            });
                        });
                    } else {
                        res.status(500).json({
                            status: false,
                            response: `Nomor ${number} tidak terdaftar.`,
                        });
                    }
                } else {
                    res.status(500).json({
                        status: false,
                        response: `WhatsApp belum terhubung.`,
                    });
                }    
            }
        }
        else
        {
            //console.log('Kirim document');
            if(!number) {
                 res.status(500).json({
                    status: false,
                    response: 'Nomor WA belum tidak disertakan!'
                });
            }
            else
            {
                
                //numberWA = '62' + number.substring(1) + "@s.whatsapp.net"; 
                numberWA = number + "@s.whatsapp.net";      // krn +62 ditambahkan di setwhatsappcontroller.php

                let filesimpan = req.files.file_dikirim;
                var file_ubah_nama = new Date().getTime() +'_'+filesimpan.name;
                //pindahkan file ke dalam upload directory
                filesimpan.mv('./images/' + file_ubah_nama);        // aslinya folder /uploads/
                let fileDikirim_Mime = filesimpan.mimetype;
                //console.log('Simpan document '+fileDikirim_Mime);

                //console.log(await sock.onWhatsApp(numberWA));

                if (isConnected) {
                    const exists = await sock.onWhatsApp(numberWA);

                    if (exists?.jid || (exists && exists[0]?.jid)) {
                        
                        let namafiledikirim = './images/' + file_ubah_nama;     // aslinya folder /uploads/
                        let extensionName = path.extname(namafiledikirim); 
                        //console.log(extensionName);
                        if( extensionName === '.jpeg' || extensionName === '.jpg' || extensionName === '.png' || extensionName === '.gif' ) {
                             await sock.sendMessage(exists.jid || exists[0].jid, { 
                                image: {
                                    url: namafiledikirim
                                },
                                caption:pesankirim
                            }).then((result) => {
                                if (fs.existsSync(namafiledikirim)) {
                                    fs.unlink(namafiledikirim, (err) => {
                                        if (err && err.code == "ENOENT") {
                                            // file doens't exist
                                            console.info("File doesn't exist, won't remove it.");
                                        } else if (err) {
                                            console.error("Error occurred while trying to remove file.");
                                        }
                                        //console.log('File deleted!');
                                    });
                                }
                                res.send({
                                    status: true,
                                    message: 'Success',
                                    data: {
                                        name: filesimpan.name,
                                        mimetype: filesimpan.mimetype,
                                        size: filesimpan.size
                                    }
                                });
                            }).catch((err) => {
                                res.status(500).json({
                                    status: false,
                                    response: err,
                                });
                                console.log('pesan gagal terkirim');
                            });
                        }else if(extensionName === '.mp3' || extensionName === '.ogg'  ) {
                            await sock.sendMessage(exists.jid || exists[0].jid, { 
                               audio: { 
                                    url: namafiledikirim,
                                    caption: pesankirim 
                                }, 
                                mimetype: 'audio/mp4'
                            }).then((result) => {
                                if (fs.existsSync(namafiledikirim)) {
                                    fs.unlink(namafiledikirim, (err) => {
                                        if (err && err.code == "ENOENT") {
                                            // file doens't exist
                                            console.info("File doesn't exist, won't remove it.");
                                        } else if (err) {
                                            console.error("Error occurred while trying to remove file.");
                                        }
                                        //console.log('File deleted!');
                                    });
                                }
                                res.send({
                                    status: true,
                                    message: 'Success',
                                    data: {
                                        name: filesimpan.name,
                                        mimetype: filesimpan.mimetype,
                                        size: filesimpan.size
                                    }
                                });
                            }).catch((err) => {
                                res.status(500).json({
                                    status: false,
                                    response: err,
                                });
                                console.log('pesan gagal terkirim');
                            });
                        }else {
                            await sock.sendMessage(exists.jid || exists[0].jid, {
                                document: { 
                                    url:  namafiledikirim,
                                    caption: pesankirim 
                                }, 
                                mimetype: fileDikirim_Mime,
                                fileName: filesimpan.name
                            }).then((result) => {
                                if (fs.existsSync(namafiledikirim)) {
                                    fs.unlink(namafiledikirim, (err) => {
                                        if (err && err.code == "ENOENT") {
                                            // file doens't exist
                                            console.info("File doesn't exist, won't remove it.");
                                        } else if (err) {
                                            console.error("Error occurred while trying to remove file.");
                                        }
                                        //console.log('File deleted!');
                                    });
                                }
                                /*
								setTimeout(() => {
                                    sock.sendMessage(exists.jid || exists[0].jid, {text: pesankirim});
                                }, 1000);
								*/
                                res.send({
                                    status: true,
                                    message: 'Success',
                                    data: {
                                        name: filesimpan.name,
                                        mimetype: filesimpan.mimetype,
                                        size: filesimpan.size
                                    }
                                });
                            }).catch((err) => {
                                res.status(500).json({
                                    status: false,
                                    response: err,
                                });
                                console.log('pesan gagal terkirim');
                            });
                        }
                    } else {
                        res.status(500).json({
                            status: false,
                            response: `Nomor ${number} tidak terdaftar.`,
                        });
                    }
                } else {
                    res.status(500).json({
                        status: false,
                        response: `WhatsApp belum terhubung.`,
                    });
                }    
            }
        }
    } catch (err) {
        res.status(500).send(err);
    }
    /*
    const message = req.query.message;
    const number = req.query.number;
    console.log(number);
    console.log(await sock.onWhatsApp(number))
    if (isConnected) {
        const exists = await sock.onWhatsApp(number);
        if (exists?.jid || (exists && exists[0]?.jid)) {
            sock.sendMessage(exists.jid || exists[0].jid, { text: message })
            .then((result) => {
                res.status(200).json({
                    status: true,
                    response: result,
                });
            })
            .catch((err) => {
                res.status(500).json({
                    status: false,
                    response: err,
                });
            });
        } else {
            res.status(500).json({
                status: false,
                response: `Nomor ${number} tidak terdaftar.`,
            });
        }
    } else {
        res.status(500).json({
            status: false,
            response: `WhatsApp belum terhubung.`,
        });
    }
    */
   
});

// send group message
app.post("/send-group-message", async (req, res) => {
    const message = req.body.message;
    const number = req.body.number;
    if (isConnected) {
        const idgroup = await sock.groupMetadata(number);
        console.log(idgroup.id);
        if (idgroup.id) {
            await sock.sendMessage(idgroup.id, { text: message })
            .then((result) => {
                res.status(200).json({
                    status: true,
                    response: result
                });
            })
            .catch((err) => {
                console.log(err);
                res.status(500).json({
                    status: false,
                    response: err
                });
            });
        } else {
            res.status(500).json({
                status: false,
                response: `Group ${number} tidak terdaftar.`,
            });
        }
    } else {
        res.status(500).json({
            status: false,
            response: `WhatsApp belum terhubung.`,
        });
    }
});

// run in main file
server.listen(port, () => {
  console.log("Server Berjalan pada Port : " + port);
});
