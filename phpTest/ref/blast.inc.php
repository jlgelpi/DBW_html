<?php
/* 
 * Settings pointing to BLAST installation details (adapted to mmb.pcb.ub.es server)
 */
$GLOBALS['blastHome'] = "/home/dbw00/blast";
$GLOBALS['blastDbsDir'] = $GLOBALS['blastHome']."/dbs";
$GLOBALS['blastExe'] = $GLOBALS['blastHome']."/bin/blastall";
$GLOBALS['blastDbs'] = array ("SwissProt" => "sprot", "PDB" => "pdb_seqres.txt");
// Possible blast settings, change as needed, check blastall -h for usage
$GLOBALS['blastCmdLine'] = $GLOBALS['blastExe'].' -p blastp -T -e 0.001 -v 100 -b 0 ';


