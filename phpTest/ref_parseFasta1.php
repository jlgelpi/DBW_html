<?php
#start Session to hold input data
session_start();
# Check if input comes from an uploaded file
if ($_FILES['uploadFile']['name']) {
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
# Process input
    # Check if this is a FASTA (first character ">")
    if (!isFasta($_REQUEST['fasta'])) { # Not fasta: take as list of ids
        # Parsing list
        $idList = explode("\n", $_REQUEST['fasta']);
        $fasta = '';
        foreach ($idList as $id) {
            if (!$id) 
                continue;
            # Clean id spaces and lines
            $id = preg_replace("/[ \r]/","",$id);
            # get Uniprot Fasta
            $thisFasta = file_get_contents("http://www.uniprot.org/uniprot/$id.fasta");
            if (!isFasta($thisFasta)) {
                print "<p>Error: $id not found</p>";
            } else {
                $fasta .= $thisFasta;
            }
        }
            
    } else {
        $fasta = $_REQUEST['fasta'];
    }
    $_SESSION['data'] = parse_Fasta($fasta);
}
?>
<html>
    <head>
        <style type="text/css">
            thead {background-color: #cccccc;color:#ffffff}
            tbody {background-color: #ffffff};
        </style>
        <link rel="stylesheet" href="DataTable/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="DataTable/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="DataTable/jquery.dataTables.min.js"></script>
   </head>
    <body>
        <p>Processed //<?php print count($_SESSION['data'])?> unique sequence(s)</p>
        <table border="0" cellspacing="2" cellpadding="4" id="dataTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Database</th>
                    <th>SwissProt Id</th>
                    <th>Header</th>
 <!--                   <th>Sequence</th>-->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['data'] as $p) {?>
                <tr>
                    <td><a href="getFasta.php?id=//<?php print $p['id']?>"><?php print $p['id'] ?></a></td>
                    <td><?php print $p['db'] ?></td>
                    <td><?php print $p['swpid'] ?></td>
                    <td><?php print $p['info'] ?></td>
                    <!--<td><pre><?php print $p['sequence'] ?></pre></td>-->
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>

<?php
function isFasta($f) {
    return (substr($f,0,1) == ">");
}

function parse_Fasta ($f) {
    $sqs = explode(">", $f);
    $data=Array();
    foreach ($sqs as $s) {
        if ($s) {
            $lines = explode("\n",$s,2);
            list($db,$id,$info) = explode("|",$lines[0]);
            list ($swp,$info) = explode(" ",$info,2);
            $data[$id] = array('db'=> $db, 'id'=> $id, 'swpid' => $swp, 'info' => $info, 'sequence' => $lines[1]);
        }
    }
    return $data;
}
?>