<html>
    <head>
        <title>test BLAST</title>
        <link rel="stylesheet" type="text/css" href="estil.css">
    </head><body bgcolor="#ffffff">
        <h1>DBW - PDB Browser</h1>
        <form name="MainForm" action="runBlast.php" method="POST" enctype="multipart/form-data">
            <table border="0" cellspacing="2" cellpadding="4" align="center">
                <tbody>
                    <tr>
                        <td valign="top"><b>Sequence search:</b></td>
                        <td><textarea name="seqQuery" rows="4" cols="60"><?= $_SESSION['inputData']['seqQuery']?></textarea><br>
                            Uploaded sequence file: <input type="file" name="seqFile" value="" width="50" /></td>
                    </tr>
                            <tr><td>
                                    Database: <select name="db">
                                        <option>SwissProt                                   
                                        </option>
                                        <option>PDB</option>
                                    </select>
                        </td></tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit" /> 
                            <input type="reset" value="Reset" />
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
