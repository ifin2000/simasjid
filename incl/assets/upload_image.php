<?php
$error       = false;
$ds          = DIRECTORY_SEPARATOR; 
$storeFolder = 'uploads';
 
if (!empty($_FILES) && $_FILES['file']['tmp_name']) {    
    
    $tempFile = $_FILES['file']['tmp_name'];
    $fileName = time().'_'.$_FILES['file']['name'];
    
    // check image type
    $allowedTypes = array(IMAGETYPE_JPEG);// list of allowed image types
    $detectedType = exif_imagetype($tempFile);
    $error = !in_array($detectedType, $allowedTypes);
    // end of check
    
    if(!$error){
        
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;     
        $targetFile =  $targetPath. $fileName;
        
        if(move_uploaded_file($tempFile,$targetFile)){
            echo '<div class="cropping-image-wrap"><img src="assets/uploads/'.$fileName.'" class="img-thumbnail" id="crop_image"/></div>';
        }
        
    }else{
        echo '<div class="alert alert-danger">This format of image is not supported</div>';
    }
}else{
    echo '<div class="alert alert-danger">How did you do that?O_o</div>';
}
?>     
