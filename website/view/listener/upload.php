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
	}else{
		$name = "../uploads/".$_POST['title'].".".$extension_upload;
		$resultat = move_uploaded_file($_FILES['file']['tmp_name'],$name);
		if ($resultat) echo "File created: ".$name;
	}
}
?>