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
	<form class="form-horizontal" role="form">
		<div class="form-group">
			<label for="title" class="col-md-2 control-label">Title</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="title" placeholder="Title" name="title">
			</div>
		</div>
		<div class="form-group">
			<label for="author" class="col-md-2 control-label">Author</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="author" placeholder="Author" name="author">
			</div>
		</div>
	<hr/>
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
	</form>
	
</div>
<?php
}
function getJavascript(){
?>


<?php
}
?>