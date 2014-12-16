<?php
if(!isset($_SESSION['logged']))
{
	redirect(base_url("main/restricted" ));
	exit;
}

