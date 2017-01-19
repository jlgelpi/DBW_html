<?php
$GLOBALS['static'] = "static/";
$GLOBALS['dbfile'] = "db/hangman.db";

# database
if (!file_exists($dbfile)) {
    $db = new SQLite3($dbfile,SQLITE3_OPEN_CREATE);
    $db->exec("CREATE TABLE games (word string, tried string, player string, points integer)");
} else {
    $db = new SQLite3($dbfile);
}
