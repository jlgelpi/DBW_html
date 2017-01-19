<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header ("Content-type:text/plain");
passthru("cat ".dirname($_SERVER['SCRIPT_FILENAME'])."/".$_REQUEST['file']);