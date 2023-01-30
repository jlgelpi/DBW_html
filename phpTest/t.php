<?php
/* Simple query to UniprotKB API */
$q = $_GET['q'];
if (!$q) {
    print "Usage: q=query";
    exit;
}
$q = urlencode($q);
$url = "https://rest.uniprot.org/uniprotkb/search?query=$q&format=tsv";
print("URL:".$url);
$data = file($url);
#============================================
?>
<html>
    <head>
        <style type="text/css">
            body {font-family:Verdana, Arial}
            th {background-color: #cccccc;color:#ffffff}
            tr:nth-child(odd) {background-color: #cccccc}
        </style>

        <link rel="stylesheet" href="../css/lib/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="../js/lib/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="../js/lib/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <table border="0" cellspacing="2" cellpadding="4" width="80%"  id="resultsTable">
            <thead>
                <tr>
                    <?php foreach (explode("\t", $data[0]) as $k) { ?>
                        <th><?= $k ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i < count($data); $i++) { ?>
                    <tr>
                        <?php foreach (explode("\t", $data[$i]) as $v) { ?>
                            <td><?= $v ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#resultsTable').DataTable();
    });
</script>
