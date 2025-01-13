<?php
if(!empty($_GET["module"])){
	include ($_GET["module"].".php");
}else{
	include "home.php";
}
?>