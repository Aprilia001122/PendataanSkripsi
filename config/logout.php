<?php

session_start();
if(session_destroy()) 
{
echo '<script language="javascript">alert("Anda berhasil Logout!"); document.location="index.php";</script>';
}
?>