<?php
//before content
$query = (isset($_GET['query'])) ? $_GET['query'] : '';
$query_type = (isset($_GET['query_type']) && ($_GET['query_type'] == 'title' || $_GET['query_type'] == 'lyrics')) ? $_GET['query_type'] : '';
?>

<?php
function getContent()
{
	global $query;
	if ($query == '')
	{
		getContentNoSearch();
	}
	else
	{
		getContentQuery($query);
	}
}


function getContentNoSearch()
{
?>
<div class="col-md-6 col-md-offset-3 pre-search-container">
	<h1>Search for title or lyrics</h1>
	<form>
		<input type='hidden' name='show' value='search'/>
		<input type='hidden' name='query_type' id='query_type_input' value='title'/>
		<div class="input-group input-group-lg">
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span id='query_type_button'>Title</span> <span class="caret"></span></button>
				<ul class="dropdown-menu">
				  <li class='active' id='query_type_title'><a href="#">Title</a></li>
				  <li id='query_type_lyrics'><a href="#">Lyrics</a></li>
				</ul>
			</div>
			<input type='text' name='query'  class='form-control'/>
		</div>
	</form>
</div>
<?php
}
function getContentQuery($query)
{
	echo "Query: " . $query;
?>


<?php
}
function getJavascript(){
	global $query;
	if ($query == '')
	{
		getJavascriptNoSearch();
	}
	else
	{
		getJavascriptQuery();
	}
?>


<?php
}
function getJavascriptNoSearch(){
?>
$('#query_type_lyrics a').click(function() {
	$('#query_type_title').removeClass('active');
	$('#query_type_lyrics').addClass('active');
	$('#query_type_button').html('Lyrics');
	$('#query_type_input').val('lyrics');
});
$('#query_type_title a').click(function() {
	$('#query_type_lyrics').removeClass('active');
	$('#query_type_title').addClass('active');
	$('#query_type_button').html('Title');
	$('#query_type_input').val('title');
});

<?php
}
function getJavascriptQuery(){
?>


<?php
}
?>