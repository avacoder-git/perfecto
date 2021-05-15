<?php

require_once ("includes/init.php");
if (!$session->is_signed_in()){redirect("login.php");}

Reference::delete_all();
$session->message("Muvaffaqiyatli tozalandi");

redirect("references.php");

?>