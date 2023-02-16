<?php
class imageResizing{

   var $image;
   var $image_type;
   var $res;

   function load($filename) {

      $image_info = getimagesize($filename);
      
      $this->image_type = $image_info[2];
      
      if( $this->image_type == IMAGETYPE_JPEG )
      {
         $this->image = imagecreatefromjpeg($filename);
         $this->res = ".jpg";
      }
      elseif( $this->image_type == IMAGETYPE_GIF ) 
      {
         $this->image = imagecreatefromgif($filename);
         $this->res = ".gif";
      }
      elseif( $this->image_type == IMAGETYPE_PNG )
      {
         $this->image = imagecreatefrompng($filename);
         $this->res = ".png";
      }
      
   }
   
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=100, $permissions=null){      

      if( $image_type == IMAGETYPE_JPEG )      
         imagejpeg($this->image,$filename,$compression);
      
      elseif( $image_type == IMAGETYPE_GIF )      
         imagegif($this->image,$filename);
      
      elseif( $image_type == IMAGETYPE_PNG )      
         imagepng($this->image,$filename);      
      
      if( $permissions != null)
         chmod($filename,$permissions);
      
   }
   
   function output($image_type=IMAGETYPE_JPEG) {
      
       if( $image_type == IMAGETYPE_JPEG )
         imagejpeg($this->image);

       elseif( $image_type == IMAGETYPE_GIF )
         imagegif($this->image);
       
       elseif( $image_type == IMAGETYPE_PNG )       
         imagepng($this->image);
       
   }
   
   function getWidth() {
      return imagesx($this->image);
   }
   
   function getHeight() {
      return imagesy($this->image);
   }
   
   function resizeToHeight($height) {
       
      $ratio = $height / $this->getHeight();
      
      $width = $this->getWidth() * $ratio;
      
      $this->resize($width,$height);
      
   }
   function resizeToWidth($width) {
       
      $ratio = $width / $this->getWidth();
      
      $height = $this->getheight() * $ratio;
      
      $this->resize($width,$height);
      
   }
   function scale($scale) {
       
      $width = $this->getWidth() * $scale/100;
      
      $height = $this->getheight() * $scale/100;
      
      $this->resize($width,$height);
      
   }
   function resize($width,$height,$x=0,$y=0) {
       
      $new_image = imagecreatetruecolor($width, $height);
      
      //imagecopyresampled($new_image, $this->image, $x, $y, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      imagecopy($new_image, $this->image, 0, 0, $x, $y, $width, $height);
      /*
      echo $x."<br/>";
      echo $y."<br/>";
      echo $width."<br/>";
      echo $height."<br/>";
      echo $this->getWidth()."<br/>";
      echo $this->getHeight();*/
      
      $this->image = $new_image;
      
   }
   
}
?>