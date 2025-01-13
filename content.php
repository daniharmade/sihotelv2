<?php
if(!empty($_GET["page"])){
	include($_GET["page"].".php");
}else{
    include "home.php";
}
?>