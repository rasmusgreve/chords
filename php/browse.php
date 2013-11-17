<?php
//before content

?>

<?php
function getContent()
{
	$letter = (isset($_GET['letter']) && preg_match("/[0-9A-ZÆØÅ]/",$_GET['letter'])) ? $_GET['letter'] : 'A';
?>
<div class="col-md-1">
	<div class="well">
		<ul class="browse_nav">
			<?php 
			for ($i = ord('A'); $i <= ord('Z'); $i++)
			{
				$l = chr($i);
				echo "<li ".(($l == $letter)?'class=\'active\'':'')."><a href='./?show=browse&letter=".chr($i)."'>".chr($i)."</a></li>";
			}
			?>
		</ul>
	</div>
</div>
<div class="col-md-11">
	<h1><?=$letter?></h1>
	<table class="table table-striped song-table">
		<thead>
			<tr>
				<th>Song title</th><th>Artist</th>
			</tr>
		</thead>
		<tbody>
			<tr class="linkrow" href="./?show=song&id=1">
				<td>Fix you</td><td>Coldplay</td>
			</tr>
			<tr class="linkrow" href="./?show=song&id=2">
				<td>Samuel and Rosella</td><td>Lemon Demon</td>
			</tr>
			<tr class="linkrow" href="./?show=song&id=3">
				<td>Circle of Life</td><td>Elton John</td>
			</tr>
		</tbody>
	</table>
</div>

<?php
}
function getJavascript(){
?>
	jQuery(document).ready(function($) {
		  $(".linkrow").click(function() {
				window.document.location = $(this).attr("href");
		  });
	});
<?php
}
?>