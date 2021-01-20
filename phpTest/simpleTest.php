<h2>This is the simple PHP test</h2>
<?php
print_r($_GET);
$q = $_GET['q'];
$url = "http://www.uniprot.org/uniprot/?query=$q&sort=score&format=tab&limit=100";

$data = file($url);
print "<pre>";
foreach ($data as $line) {
    print "$line"."<br>";
}
print "</pre>";

