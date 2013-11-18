<?php
// http://www.youtube.com/watch?v=Wb5VOQexMBU
$id = getPOST('id', '/-?\d+/');
if ($id != '') //If posting an ID!
{
	$title = getPOST('title');
	$artist = getPOST('artist');
	$lyrics = getPOST('lyrics');
	$youtube = getPOST('youtube');

	$kv_pairs = array('title' => $title, 'artist' => $artist, 'lyrics' => $lyrics, 'youtube' => $youtube);
	$id = insertOrUpdate('song',$id,$kv_pairs);
	header("Location: ./?show=edit&id=$id");
}

//before content

?>

<?php
function getContent()
{
	$id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : -1;
	$song = array('id' => '-1','title' => '','artist' => '','lyrics' => '','youtube' => '');
	if ($id != -1)
	{
		$song_query = mysql_query("SELECT * FROM `song` WHERE `id` = '$id';");
		$song = mysql_fetch_assoc($song_query);
	}
?>
<div class='col-md-12'>
	<h1><?=($id==-1)?'Add':'Edit'?> song</h1>
	<form class="form" role="form" method="post" action="./?show=edit">
		<input type="hidden" name="id" value="<?=$song['id']?>" />
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="title" class="control-label">Title</label>
					<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?=$song['title']?>">
				</div>
				<div class="form-group">
					<label for="artist" class="control-label">Artist</label>
					<input type="text" class="form-control" id="artist" placeholder="Artist" name="artist" value="<?=$song['artist']?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="youtube" class="control-label">Youtube link</label>
					<input type="text" class="form-control" id="youtube" placeholder="Youtube link" name="youtube" value="<?=$song['youtube']?>">
				</div>
				<div class="form-group">
					<label for="" class="control-label">_</label>
					<input type="text" class="form-control" id="" placeholder="" name="" value="">
				</div>
			</div>
		</div>
		
	<!-- Nav tabs -->
	<div class="panel panel-default">
		<div class="panel-body">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#lyrics" data-toggle="tab">Lyrics</a></li>
				<li><a href="#chords" data-toggle="tab">Chords</a></li>
				<li><a href="#form" data-toggle="tab">Form</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="lyrics">
					<textarea class="form-control" id="lyric_content" name="lyrics" placeholder="Type or paste lyrics here..." rows=20><?=$song['lyrics']?></textarea>
				</div>
				<div class="tab-pane" id="chords">
					<div class="row"><!--todo: store in 2d array and transfer as json -->
						<div class="col-md-9">
							<br/>
							<table>
								<tr>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
								</tr>
								<tr>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
									<td><input type="text"/></td>
								</tr>
							</table>
						</div>
						<div class="col-md-3">
							<br/>
							<div class="list-group">
								<a href="#" class="list-group-item active">
									Verse
								</a>
								<a href="#" class="list-group-item">
									Chorus
								</a>
								<a href="#" class="list-group-item text-center">
									<span class="glyphicon glyphicon-plus-sign"></span> Add
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="form">
					(Can wait)
				</div>
			</div>
			</div>
	</div>
	
	<input type="submit" class="btn btn-primary" value="Save" />
	<a href="./" class="btn btn-default">Back</a> <!--TODO: Onclick js check for changes-->
	
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