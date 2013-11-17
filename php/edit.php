<?php
//before content

?>

<?php
function getContent()
{
	$id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : -1;
	$song = array('id' => '-1','title' => '','artist' => '','lyrics' => '');
	if ($id != -1)
	{
		$song_query = mysql_query("SELECT * FROM `song` WHERE `id` = '$id';");
		$song = mysql_fetch_assoc($song_query);
	}
?>
<div class='col-md-12'>
	<h1><?=($id==-1)?'Create':'Edit'?> song</h1>
	<form class="" role="form">
		<div class="form-group">
			<label for="title" class="control-label">Title</label>
				<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?=$song['title']?>">
		</div>
		<div class="form-group">
			<label for="artist" class="control-label">Artist</label>
				<input type="text" class="form-control" id="artist" placeholder="Artist" name="artist" value="<?=$song['artist']?>">
		</div>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#lyrics" data-toggle="tab">Lyrics</a></li>
		<li><a href="#parts" data-toggle="tab">Parts</a></li>
		<li><a href="#form" data-toggle="tab">Form</a></li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane active" id="lyrics">
			<div class="panel panel-default">
				<div class="panel-body">
					<textarea class="form-control" id="lyric_content" placeholder="Type or paste lyrics here..." rows=20><?=$song['lyrics']?></textarea>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="parts">
			<div class="panel panel-default">
				<div class="panel-body">
					Parts
				
				</div>
			</div>
		</div>
		<div class="tab-pane" id="form">
			<div class="panel panel-default">
				<div class="panel-body">
					(can wait)
				
				</div>
			</div>
		</div>
	</div>
	
	<a href="#" class="btn btn-primary">Done</a>
	
	<!--
	<div class="row">
		<div class="col-md-9">
			<div class="edit-song-area">
				<h3>Intro</h3>
				<div class="row">
					<div class="col-md-3">4</div>
					<div class="col-md-3">4</div>
					<div class="col-md-3">4</div>
					<div class="col-md-3">4</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="well">
				<h2>Form</h2>
				<ul class="list-group">
					<li class="list-group-item">Intro</li>
					<li class="list-group-item">Verse 1</li>
					<li class="list-group-item">Verse 2</li>
					<li class="list-group-item">Chorus</li>
					<li class="list-group-item">Verse 3</li>
					<li class="list-group-item">Chorus</li>
					<li class="list-group-item">Bridge</li>
					<li class="list-group-item">Chorus</li>
				</ul>
			</div>
		</div>
	</div>
	-->
	</form>
	
</div>
<?php
}
function getJavascript(){
	$id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : -1;
?>

<?php
}
?>