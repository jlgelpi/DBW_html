<?php
$query = $_GET['q'];
if (!$query) {
	print "<html><body><h4>Usage: q=keyword</h4></body></html>";
 	exit;
}
#GEtting info from Uniprot
$url="http://www.uniprot.org/uniprot/?query=$query&sort=score&format=tab";
print $url;
$data = file($url);
?>
<html>
<head>
<style>
P {font-family:Arial,SansSerif; font-size:12pt; color:red}
.query {color:blue}
</style>
</head>
<body>
<p>Query was <span class="query"><?php print $query?></span></p>
<p>First line is <?php print $data[0]?></p>
<table border="1" cellspacing="0" cellpadding="2">
<tr>
<?php
foreach (explode("\t",$data[0]) as $f) { ?>
<th><?php print $f ?></td>
<?php }
?>
<?php
for ($i=1;$i<count($data);$i++) {?>
<tr>
<?php	foreach (explode("\t",$data[$i]) as $v) {?>
	<td><?php print $v?></td>
<?php }?>
</tr>
<?php } ?>
</table>}
	
</body>
</html>


