<?php
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
		<tr class="linkrow" href="./?show=play&id=1">
			<td>Fix you</td><td>Coldplay</td><td>&nbsp;<span class='label label-success'>Chords</span> <span class='label label-info'>Lyrics</span></td>
		</tr>
		<tr class="linkrow" href="./?show=play&id=2">
			<td>Samuel and Rosella</td><td>Lemon Demon</td><td>&nbsp;<span class='label label-success'>Chords</span></td>
		</tr>
		<tr class="linkrow" href="./?show=play&id=3">
			<td>Circle of Life</td><td>Elton John</td><td>&nbsp;<span class='label label-info'>Lyrics</span></td>
		</tr>
	</tbody>
</table>
<?php
}
?>