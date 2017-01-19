<?php
$q = $_GET['q'];
if (!$q) {
    print "Usage: q=query";
    exit;
}
$q = urlencode($q);
#http://www.uniprot.org/uniprot/?query=brca&sort=score&format=tab&limit=100
$url = "http://www.uniprot.org/uniprot/?query=$q&sort=score&format=tab&limit=100";
$data = file($url);
?>
<html>
    <head>
        <style type="text/css">
            th {background-color: #cccccc;color:#ffffff}
            tr:nth-child(odd) {background-color: #cccccc}
        </style>

        <link rel="stylesheet" href="DataTable/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="DataTable/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="DataTable/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <table border="0" cellspacing="2" cellpadding="4" width="80%"  id="resultsTable">
            <thead>
                <tr>
                    <?php foreach (explode("\t", $data[0]) as $k) { 
                        print "<th>".$k."</th>";
                    } ?>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i < count($data); $i++) { ?>
                    <tr>
                        <?php foreach (explode("\t", $data[$i]) as $v) {
                            ?>
                            <td><?php print $v ?> </td>
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
