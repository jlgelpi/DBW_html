<?php
include "../PDBBrowser/include/libDBW.inc.php";
print headerDBW("Test FORM");
?>

<form action="newForm1.php" method="POST">
    <table>
        <tr>
            <td>PDB Id.</td>
            <td><input name="Data[PDBId]" size="10"></td>
        </tr>
        <tr>
            <td>Compound Type</td>
            <td><input name="Data[compT][1]" type="checkbox"> nuc
                <input name="Data[compT][2]" type="checkbox"> prot
            </td>
        </tr>
        <tr>
            <td>Exp Type</td>
            <td><input name="Data[expT][1]" type="checkbox"> XRay
                <input name="Data[expT][2]" type="checkbox"> NMR
            </td>
        </tr>
        <tr>
            <td>Text query</td>
            <td><input name='Data[query]' size='40'></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="Submit data"></td>
        </tr>
    </table>
    
    
</form>

<?php 
print footerDBW();
