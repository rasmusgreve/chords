<?php
//before content
$query = (isset($_GET['query'])) ? $_GET['query'] : '';
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
	echo "No search";
?>


<?php
}
function getContentQuery($query)
{
	echo "Query: " . $query;
?>


<?php
}
function getJavascript(){
?>


<?php
}
?>