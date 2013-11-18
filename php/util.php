<?php
include_once("connectdb.php");

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
		return (isset($_GET[$name])) ? mysql_real_escape_string($_GET[$name]) : $default_value;
	}
}

function getPOST($name, $legal_values = '', $default_value = '')
{
	if (is_array($legal_values))
	{
		return (isset($_POST[$name]) && in_array($_POST[$name],$legal_values)) ? $_POST[$name] : $default_value;
	}
	else if($legal_values != '')
	{
		return (isset($_POST[$name]) && preg_match($legal_values,$_POST[$name])) ? $_POST[$name] : $default_value;
	}
	else
	{
		return (isset($_POST[$name])) ? $_POST[$name] : $default_value;
	}
}

function insertOrUpdate($table, $id, $key_values)
{
	if ($id == -1)
	{
		$keys = array(); 
		$values = array();
		foreach ($key_values as $key => $value)
		{
			$keys[] = "`$key`";
			$values[] = "'".mysql_real_escape_string($value)."'";
		}
		mysql_query("INSERT INTO `$table` (" . implode(',',$keys) . ") VALUES (" . implode(',',$values) . ");");
		return mysql_insert_id();
	}
	else
	{
		$kv_strings = array();
		foreach ($key_values as $key => $value)
		{
			$kv_strings[] = "`$key` = '" . mysql_real_escape_string($value) . "'";
		}
		mysql_query("UPDATE `$table` SET " . implode(',',$kv_strings) . " WHERE `id` = '$id' LIMIT 1;");
		return $id;
	}
}





function songTable($query_result)
{
?>
<table class="table table-striped song-table">
	<thead>
		<tr>
			<th>Song title</th><th>Artist</th><th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($res = mysql_fetch_assoc($query_result)) {
		?>
			<tr class="linkrow" href="./?show=play&id=<?=$res['id']?>">
				<td><?=$res['title']?></td><td><?=$res['artist']?></td><td>&nbsp;<span class='label label-success'>Chords</span> <span class='label label-info'>Lyrics</span></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
<?php
}
?>