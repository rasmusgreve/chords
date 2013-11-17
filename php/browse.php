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
	<?php songTable("test"); ?>
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