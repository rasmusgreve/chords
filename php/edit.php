<?php
//before content

?>

<?php
function getContent()
{
	$id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : -1;
?>
<div class='col-md-12'>
	<h1><?=($id==-1)?'Create':'Edit'?> song</h1>
	<form class="" role="form">
		<div class="form-group">
			<label for="title" class="control-label">Title</label>
				<input type="text" class="form-control" id="title" placeholder="Title" name="title">
		</div>
		<div class="form-group">
			<label for="author" class="control-label">Author</label>
				<input type="text" class="form-control" id="author" placeholder="Author" name="author">
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
					<textarea class="form-control" id="lyric_content" placeholder="Type or paste lyrics here..." rows=10></textarea>
					<br/>
					<div class="btn-group lyric-pages">
					  <a href="#" class="btn btn-primary" data-value="1">1</a>
					  <a href="#" class="btn btn-default" data-value="2">2</a>
					  <a href="#" class="btn btn-default" id="lyric-add">+</a>
					</div>
					<div class="pull-right">
					  <a href="#" class="btn btn-primary">Save</a>
					  <a href="#" class="btn btn-danger">Delete</a>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="parts">Parts</div>
		<div class="tab-pane" id="form">Form</div>
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
?>
<script>
$("#lyric-add").click(function() {

});
$("#lyric-add").click(function() {

</script>
<?php
}
?>