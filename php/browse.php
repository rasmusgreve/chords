<?php
//before content

?>

<?php
function getContent()
{
	$letter = (isset($_GET['letter']) && preg_match("/[0-9A-ZÆØÅ]/",$_GET['letter'])) ? $_GET['letter'] : 'A';
	
	$overview_query = mysql_query("SELECT SUBSTRING(`title`,1,1) letter FROM `song` GROUP BY SUBSTRING(`title`,1,1);");
	$active_letters = array();
	while ($res = mysql_fetch_assoc($overview_query))
	{
		$active_letters[$res['letter']] = true;
	}
	$browse_query = mysql_query("SELECT `title`, `artist` FROM `song` WHERE `title` LIKE '$letter%';");
	
?>
<div class="col-md-1">
	<div class="well">
		<ul class="browse_nav">
			<?php 
			for ($i = ord('A'); $i <= ord('Z'); $i++)
			{
				$l = chr($i);
				if (isset($active_letters[$l]))
					echo "<li ".(($l == $letter)?'class=\'active\'':'')."><a href='./?show=browse&letter=$l'>$l</a></li>";
				else
					echo "<li ".(($l == $letter)?'class=\'active\'':'').">$l</li>";
			}
			?>
		</ul>
	</div>
</div>
<div class="col-md-11">
	<h1><?=$letter?></h1>
	<?php songTable($browse_query); ?>
</div>

<?php
}
function getJavascript(){
?>

<?php
}
?>