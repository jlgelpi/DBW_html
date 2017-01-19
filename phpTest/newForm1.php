<?php
include "../PDBBrowser/include/libDBW.inc.php";
print_r ($_REQUEST);
if ($_REQUEST['Data']['PDBId']) { 
    header("Location: newForm2.php?PDBId=".$_REQUEST['Data']['PDBId']);
} else {

$sql = "SELECT * FROM entry e, expType et, 
author a, author_has_entry ae, source s, entry_has_source es WHERE
e.idExpType = et.idExpType AND
a.idAuthor = ae.idAuthor AND
e.idCode = ae.idCode AND
s.idSoure = es.idSource AND
e.idSource = es.idSource AND ";

$ANDconditions = Array(" TRUE ");

if ($_REQUEST['Data']['compT']) {

}

if ($_REQUEST['Data']['expT']) {
    
}

if ($_REQUEST['Data']['query']) {
   $ANDconditions[] =  "e.compound like '%".$_REQUEST['Data']['query']."%'"; 
}

$sql .=  join (" AND ", $ANDconditions);


print $sql;
} ?>


    
    




