<?php
include_once("connectdb.php");





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