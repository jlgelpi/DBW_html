<?php
include "blast.inc.php";
// Get Uploaded file if any
if ($_FILES['seqFile']['tmp_name'])
	$_REQUEST['seqQuery']=file_get_contents($_FILES['seqFile']['tmp_name']);
// prepare FASTA file
$p = strpos($_REQUEST['seqQuery'], '>');
if (!$p and ($p !== 0)) { // strpos returns False if not found and "0" if first character in the string
    // It is not already FASTA
    $_REQUEST['seqQuery'] = ">User provided sequence
" . $_REQUEST['seqQuery'];
}
$tempDir = pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_DIRNAME)."/blasttmp";
if (!file_exists($tempDir))
    mkdir ($tempDir, 0777);
$tempFile = $tempDir . "/" . uniqId('blast');
$ff = fopen($tempFile . ".query.fasta", 'wt');
fwrite($ff, $_REQUEST['seqQuery']);
fclose($ff);

// execute Blast
$cmdLine = $blastCmdLine." -i ".$tempFile.".query.fasta -o ".$tempFile.".blast.out "
        . "-d $blastDbsDir/".$blastDbs[$_REQUEST['db']];
print $cmdLine;
exec($cmdLine);
#
passthru("cat $tempFile".".blast.out");
?>