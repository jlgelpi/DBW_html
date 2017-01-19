<HTML>
<body>
Server Protocol: <?=$_SERVER[SERVER_PROTOCOL]?><br>
Remote Address: <?=$_SERVER[REMOTE_ADDR]?><br>
Request Method: <?=$_SERVER[REQUEST_METHOD]?><br>
Query_string: <?=$_SERVER[QUERY_STRING]?><br>
Post Data:<br>
<?=$HTTP_RAW_POST_DATA?><br>
<?foreach (array_keys($_SERVER) as $k) {
print "$k $_SERVER[$k]<br>";
}?>
</BODY>
</HTML>
