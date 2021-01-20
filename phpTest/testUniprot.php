<?php 
$uniprotPrefix="https://www.uniprot.org/uniprot/";
if (!$_GET) {
   print "<h1> no query</h1>";
} else {
        $q = urlencode($_GET['query']);
	$url =$uniprotPrefix.'?query='.$q.'&format=tab';

	$data = file($url);

	print_r($data);

}






