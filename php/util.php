<?php
include_once("connectdb.php");

function getPOSTorGET($POSTorGET, $name, $legal_values = '', $default_value = '')
{
	if (is_array($legal_values))
	{
		return (isset($POSTorGET[$name]) && in_array($POSTorGET[$name],$legal_values)) ? $POSTorGET[$name] : $default_value;
	}
	else if($legal_values != '')
	{
		return (isset($POSTorGET[$name]) && preg_match($legal_values,$POSTorGET[$name])) ? $POSTorGET[$name] : $default_value;
	}
	else
	{
		return (isset($POSTorGET[$name])) ? mysql_real_escape_string($POSTorGET[$name]) : $default_value;
	}
}



function getGET($name, $legal_values = '', $default_value = '')
{
	return getPOSTorGET($_GET, $name, $legal_values, $default_value);
}

function getPOST($name, $legal_values = '', $default_value = '')
{
	return getPOSTorGET($_POST, $name, $legal_values, $default_value);
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





function songTable($filter = '')
{
	$where = ($filter == '') ? '' : "WHERE $filter";
	$query_result = mysql_query("SELECT s.`id`, s.`title`, s.`artist`, (TRIM(s.`lyrics`) <> '') as has_lyrics, (COUNT(c.`id`) > 0) as has_chords FROM `song` s LEFT JOIN `chords` c ON c.`song` = s.`id` $where GROUP BY s.`id`;");
	
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
			//$chords_object = json_decode($res['chords']);
			// json_encode(array(array("Em","D","Gm","A"),array("Em","D","Gm","A")));
			// array(array())
		?>
			<tr class="linkrow" href="./?show=play&id=<?=$res['id']?>">
				<td><?=$res['title']?></td>
				<td><?=$res['artist']?></td>
				<td>&nbsp;<?=$res['has_chords']?'<span class="label label-success">Chords</span>':''?> <?=$res['has_lyrics']?'<span class="label label-info">Lyrics</span>':''?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
<?php
}
?>