<?php
/*
 * vim: ts=3 sw=3 et wrap co=150 go-=b
 */

function pre($var) {
   echo "<pre>\n";
   var_dump($var);
   echo "</pre>\n";
}

if (session_status() != PHP_SESSION_ACTIVE) {
   session_start();
}
?>
