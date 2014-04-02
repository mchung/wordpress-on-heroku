<?php
class CI_Up_Mark{

var $ufilename="" ;        // FILE NAME VARIABLE
var $filepath="" ;        //  FILE PATH VARIABLE
var $filepaththumb="";   //   FILE PATH THUMB VARIBLE
var $filepathnormal=""; //    FILE PATH NORMAL VARIABLE;
var $thumb_Height= "";
var $thumb_Width = "";

 function CI_Up_Mark(){
    $this->thumb_Height= 200;
    $this->thumb_Width = 200;
 }

 function set_File($uFile){
 	$this->ufilename = trim($uFile);
 }
 function set_FPath($filepath){
 	$this->filepath = trim($filepath);
 }
 function is_ImageFile(){
	$rt = array("image/pjpeg","image/jpg","image/jpeg","image/gif","image/png");
	if(in_array($_FILES[$this->ufilename]['type'],$rt))
		return true;
	else
		return false;
 }
 
 function getPathinfo($_sPath, $type){
	$parts = pathinfo($_sPath);
	return $parts[$type];  
 }

 function is_FlashFile(){
    $rt = array("swf","application/x-shockwave-flash");
    echo $_FILES[$this->ufilename]['type'];
	if(in_array($_FILES[$this->ufilename]['type'],$rt))
		return true;
	else
		return false;
 }
 function is_TextFile(){
	$rt = array("application/msword","text/plain");
	if(in_array($_FILES[$this->ufilename]['type'],$rt))
		return true;
	else
		return false;
 }
 function is_VideoFile(){
	$rt = array("video/x-ms-wmv","video/3gpp","video/x-msvideo","video/mpeg","video/quicktime","application/force-download");
	if(in_array($_FILES[$this->ufilename]['type'],$rt))
		return true;
	else
		return false;
 }
 function is_AudioFile(){
	$rt = array("audio/mpeg","audio/x-ms-wma","audio/wav","audio/midi","audio/mid");
	if(in_array($_FILES[$this->ufilename]['type'],$rt))
		return true;
	else
		return false; 
 }
 
 function resize_Image($imgfile,$imgtarget,$width,$height){
		$arrList = array('jpg','jpeg','png','gif');
		$fName = basename($imgfile);
		$ext = end(explode('.',$fName));
		$img_Indexnum = array_search($ext,$arrList);
      	list($w_orig, $h_orig) = getimagesize($imgfile);
    	$width = ($w_orig<=$width )?$w_orig:$width;
     	$height= ($h_orig<=$height)?$h_orig:$height;

     	if ($width && ($w_orig < $h_orig)) {
         	$width = ($height / $h_orig) * $w_orig;
     	} else {
       	 	$height = ($width / $w_orig) * $h_orig;
    	}

     	$image_p = imagecreatetruecolor($width, $height);     
     	if($img_Indexnum==0 || $img_Indexnum ==1) { $image = imagecreatefromjpeg($imgfile); }
     	if($img_Indexnum==2) { $image = imagecreatefrompng($imgfile); }
     	if($img_Indexnum==3) { $image = imagecreatefromgif($imgfile); }
     	

     	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $w_orig, $h_orig);

     	if($img_Indexnum==0 || $img_Indexnum ==1) { imagejpeg($image_p,$imgtarget, 100);}
     	if($img_Indexnum==2) { imagepng($image_p,$imgtarget, 9);}
     	if($img_Indexnum==3) { imagegif($image_p,$imgtarget, 100);}
        imagedestroy($image_p);
 }
 
 # UPLOAD THE FILE 	
 function do_UploadFile(){
	if(!empty($_FILES[$this->ufilename]['name'])){
		$newfilename = "";
		while(file_exists($this->filepath.$newfilename)){
			$tmpname = rand(0,999999999);
			$ufile  = $_FILES[$this->ufilename]['name'];
			$ext = end(explode(".",$ufile));
			$newfilename = $tmpname.".".$ext;
		}
		$filetoupload = $this->filepath.$newfilename;
        $filetothumb  = $this->filepaththumb.$newfilename;
        $filetonormal = $this->filepathnormal.$newfilename;
		$success =move_uploaded_file($_FILES[$this->ufilename]['tmp_name'],$filetoupload);

		if($success){
			global $newfilename;
            $dimension = getimagesize($filetoupload);
		    /*if($dimension[0] > 550 || $dimension[1] > 550){
                CI_Up_Mark::resize_Image($filetoupload,$filetoupload,550,600);
            }
            */
            $this->filepathnormal!="" ? CI_Up_Mark::resize_Image($filetoupload,$filetonormal,628,355) : false;
            $this->filepaththumb!="" ? CI_Up_Mark::resize_Image($filetoupload,$filetothumb,150,150) : false;
            @chmod($filetoupload, 0755);
            $this->filepaththumb!="" ? @chmod($filetothumb, 0755) : false;
            $this->filepathnormal!="" ? @chmod($filetonormal, 0755) : false;
			$nicefilenameext = end(explode(".",$filetoupload));
            return $tmpname.'.'.$nicefilenameext;
        }
    }
    return false;
 }
 
 
 function do_UploadVideo(){
	$newfilename = "";
	while(file_exists($this->filepath.$newfilename)){
		$tmpname = rand(0,999999999);
		$ufile  = $_FILES[$this->ufilename]['name'];
		$ext = end(explode(".",$ufile));
		$newfilename = $tmpname.".".$ext;
	}
	
	$filetoupload = $this->filepath.$newfilename;
	$success = copy($_FILES[$this->ufilename]['tmp_name'], $filetoupload); 
	if($success){
		return $newfilename;
	}else{
		return false;
	}
 }

function crop_Image($imgFile,$imgNewPath,$new_W,$new_H){
	$arrList = array('jpg','jpeg','png','gif');
	$fName = basename($imgFile);
	$ext = end(explode('.',$fName));
	$img_Indexnum = array_search($ext,$arrList);
	
	$imgSize = getimagesize($imgFile);
	$img_W = $imgSize[0];
	$img_H = $imgSize[1];
	
	
	
	$new_ImagePath = imagecreatetruecolor($new_W,$new_H);
	
	
	if($img_Indexnum==0 || $img_Indexnum ==1) { $imgPath = imagecreatefromjpeg($imgFile); }
     	if($img_Indexnum==2) { $imgPath = imagecreatefrompng($imgFile); }
     	if($img_Indexnum==3) { $imgPath = imagecreatefromgif($imgFile); }
	
	
	$width = ($img_W<=$this->thumb_Width )?$img_W:$this->thumb_Width;
	$height= ($img_H<=$this->thumb_Height)?$img_H:$this->thumb_Height;
	if ($width && ($img_W < $img_H)) {
		$width = ($height / $img_H) * $img_W;
	} else {
		$height = ($width / $img_W) * $img_H;
	}
	
	imagecopyresampled($new_ImagePath,$imgPath,0,0,0,0,$new_W,$new_H,$width,$height);
	imagejpeg($new_ImagePath,$imgNewPath, 100);

	if($img_Indexnum==0 || $img_Indexnum ==1) { imagejpeg($new_ImagePath,$imgNewPath, 100);}
     	if($img_Indexnum==2) { imagepng($new_ImagePath,$imgNewPath, 9);}
     	if($img_Indexnum==3) { imagegif($new_ImagePath,$imgNewPath, 100);}
	
	
	imagedestroy($new_ImagePath);

	return $imgNewPath;
 }
 
 function MarkTets(){
	echo "test";
 }

}

?>