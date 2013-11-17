<?php
function getGET($name, $legal_values = '', $default_value = '')
{
	if (is_array($legal_values))
	{
		return (isset($_GET[$name]) && in_array($_GET[$name],$legal_values)) ? $_GET[$name] : $default_value;
	}
	else if($legal_values != '')
	{
		return (isset($_GET[$name]) && preg_match($legal_values,$_GET[$name])) ? $_GET[$name] : $default_value;
	}
	else
	{
		return (isset($_GET[$name])) ? $_GET[$name] : $default_value;
	}
}
//Base data
$value = getGET('value','/[a-z]+/');
$action = getGET('action',array('put','get','delete'));
$data = mysql_real_escape_string(getGET('data'));
if ($value == '') die("Illegal request. Must set 'value'.");
if ($action == '') die("Illegal request. Must set 'action' to one of: put, get, delete.");
if ($data == '' && $action == 'put') die("Illegal request. Action 'put' requires 'data'");

include_once("php/connectdb.php");
/////////////////////////////////////////////////////////////////////////////////////////
//Handle different values
switch($value)
{
	case 'lyrics': value_lyrics($action, $data); break;
	default: die("Illegal request. Unknown value '$value'.");
}


function value_lyrics($action, $data)
{
	$song = getGET('song','/\d+/');
	$id = getGET('id','/\d+/');
	if ($song == '') die("Illegal request. No song set.");
	if ($id == '') die("Illegal request. No ID set.");
	switch($action)
	{
		case 'get':
			$q = mysql_query("SELECT `text` FROM `lyrics` WHERE `song` = '$song' AND `id` = '$id' LIMIT 1;");
			if (mysql_num_rows($q) == 0) die("");
			echo mysql_result($q,0,0);
			break;
		case 'put':
			$q = mysql_query("UPDATE `lyrics` SET `text` = '$data' WHERE `song` = '$song' AND `id` = '$id' LIMIT 1;");
			echo "done";
			break;
		case 'delete':
			$q = mysql_query("DELETE FROM `lyrics` WHERE `song` = '$song' AND `id` = '$id' LIMIT 1;");
			echo "done";
			break;
	}
}


?>