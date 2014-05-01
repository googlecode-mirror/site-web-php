<?php

if ($_FILES['file']['error'] > 0)
{
	$erreur = "Erreur lors du transfert";
}else{
	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	//1. strrchr renvoie l'extension avec le point (« . »).
	//2. substr(chaine,1) ignore le premier caractère de chaine.
	//3. strtolower met l'extension en minuscules.
	$extension_upload = strtolower(  substr(  strrchr($_FILES['file']['name'], '.')  ,1)  );
	if (! in_array($extension_upload,$extensions_valides) ){
		$erreur = "Unexpected file type";
		echo($erreur);
	}else{
		$width=500; //*** Fix Width & Heigh (Autu caculate) ***//
		$size=GetimageSize($_FILES['file']['tmp_name']);
		$height=round($width*$size[1]/$size[0]);
		$images_orig = ImageCreateFromJPEG($_FILES['file']['tmp_name']);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		$name = "../uploads/".$_POST['title'].".".$extension_upload;
		ImageJPEG($images_fin,$name);
		header("location:../uploadImages.php");
	}
}
?>