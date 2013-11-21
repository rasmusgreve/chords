<?php
//before content
$query = (isset($_GET['query'])) ? $_GET['query'] : '';
?>

<?php
function getContent()
{
	$id = getGET('id', '/\d+/', -1);
	if ($id == -1) {echo "Error. Unknown id";return;}
	
	$song_query = mysql_query("SELECT * FROM `song` WHERE `id` = '$id' LIMIT 1;");
	$song_assoc = mysql_fetch_assoc($song_query);
	$parts_query = mysql_query("SELECT * FROM `chords` WHERE `song` = '$id';");
?>
<h1><?=$song_assoc['title']?></h1>
<span><?=$song_assoc['artist']?></span>
<hr>
<div class='row'>
	<div class='col-md-7'>
		<?php
		while ($res = mysql_fetch_assoc($parts_query)) {
			$chords = json_decode($res['json']);
		?>
		<h3><?=$res['name']?></h3>
			<?php foreach($chords as $row) {
					foreach($row as $chord) {?>
						<?=$chord?> - 
				<?php }
			}
		}?>
	</div>
	<div class='col-md-5'>
<pre>
<?=$song_assoc['lyrics']?>
</pre>
	</div>
</div>
<?php
}
function getJavascript(){
?>
<script type="text/javascript">
</script>
<?php
}
?>