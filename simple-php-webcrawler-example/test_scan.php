<?php
	require_once('errorflags.php');
	$lines = file_get_contents('https://st-bernard.min-breeder.com/dog1701-01573.html');
	$url = 'https://st-bernard.min-breeder.com/dog1701-01573.html';
   	if(strpos($lines, "販売中")!=false){
   		echo " On Sale";
   		$price = getDogPrice($lines,$url);
   		echo "<br> Price => " .$price;
   	}
   	else if(strpos($lines, "商談中")!=false){
   		echo "Negotiatiable";
   	}
   	else if(strpos($lines, "成約済み")!=false){
   		echo "Sold";
   	}
   	else{
   		echo "Key Not Found";
   	}

   	function getDogPrice($content,$url){

   		// scan content to get price
   		$xml = new DOMDocument();
   		$xml->loadHTMLFile($url,LIBXML_NOWARNING); 
   		foreach($xml->getElementsByTagName('font') as $link) { 

   			if($link->getAttribute('color') == "red"){

   				if($link->nodeValue != "-")
        			$price = (int)str_replace(',', "", $link->nodeValue);
        		else
        			$price = 0;

        		break;
   			}
        	//echo "<h2> <em>". var_dump($price) ."</em> </h2>";
    	}


   		if(!isset($price))
   			return 0;
   		else
   			return $price;
   	}

?>