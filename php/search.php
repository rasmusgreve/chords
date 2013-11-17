<?php
//before content
$query = (isset($_GET['query'])) ? $_GET['query'] : '';
$query_type = (isset($_GET['query_type']) && ($_GET['query_type'] == 'title' || $_GET['query_type'] == 'lyrics' || $_GET['query_type'] == 'artist')) ? $_GET['query_type'] : '';
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
		getContentQuery();
	}
}


function getContentNoSearch()
{
?>
<div class="col-md-8 col-md-offset-2 pre-search-container">
	<h1>Search for title, artist or lyrics</h1>
	<form method="get" action="./">
		<input type='hidden' name='show' value='search'/>
		<input type='hidden' name='query_type' id='query_type_input' value='title'/>
		<div class="input-group input-group-lg">
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span id='query_type_button'>Title</span> <span class="caret"></span></button>
				<ul class="dropdown-menu" id="query_type_menu">
				  <li class='active' id='query_type_title' data-value="title"><a href="#">Title</a></li>
				  <li id='query_type_lyrics' data-value="lyrics"><a href="#">Lyrics</a></li>
				  <li id='query_type_artist' data-value="artist"><a href="#">Artist</a></li>
				</ul>
			</div>
			<input type='text' name='query' class='form-control'/>
			<div class="input-group-btn">
				<button type="submit" class="btn btn-primary">Search</button>
			</div>
		</div>
	</form>
</div>
<?php
}
function getContentQuery()
{
	global $query, $query_type;
	
	$query_type_print = ($query_type == 'title') ? 'titles' : ($query_type == 'lyrics') ? 'lyrics' : 'artists';
?>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-10">
			<h1>Search results for <?=$query_type_print?> containing "<?=$query?>"</h1>
		</div>
		<div class="col-md-2 text-right">
			<a href="./?show=search" class="btn btn-default">New search</a>
		</div>
	</div>
	<?php songTable("test"); ?>
</div>


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



$('#query_type_menu li a').click(function() {
	$('#query_type_menu li').removeClass('active');
	$(this).parent().addClass('active');
	$('#query_type_button').html($(this).html());
	$('#query_type_input').val($(this).parent().data('value'));
});
	

<?php
}
function getJavascriptQuery(){
?>

<?php
}
?>