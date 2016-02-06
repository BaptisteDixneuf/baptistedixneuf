<?php

class ImagesController extends Controller {


	

    function index() {
    	$this->layout="vide";
    	$data=$_POST['data'];
    	$nom=$_POST['image'];
    	echo $nom;

    	$output_file="/home/baptistedixneuf/www/images/link/".$nom;
    	$base64_string=$data;


    	$ifp = fopen($output_file, "wb"); 

	    $data = explode(',', $base64_string);

	    fwrite($ifp, base64_decode($data[1])); 
	    fclose($ifp); 

	    

    }

    


}

?>