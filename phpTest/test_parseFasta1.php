<?php
if ($_FILES['uploadFile']['tmp_name']) {
    $_REQUEST['fasta']=  file_get_contents($_FILES['uploadFile']['tmp_name']);
}

if (!$_REQUEST['fasta']) { ?>
<html>
    <head>
        <title>Error: No request</title>
    </head>
    <body>
        <h2>Error: Received request was empty</h2>
    </body>
</html>
<?php
} else {
   ?>
<?php
# Check if FASTA
    if (!isFasta($_REQUEST['fasta'])) {
        print "<H1> Is Not FASTA</h1>";
    } else {
        print "<h1> It is FASTA</h1>";
    }
}


function isFasta($f) {
    return (substr($f,0,1) == ">");
}
