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
				<li class="active"><a href="#chords" data-toggle="tab">Chords</a></li>
				<li><a href="#lyrics" data-toggle="tab">Lyrics</a></li>
				<li><a href="#form" data-toggle="tab">Form</a></li>
			</ul>

			<div class="tab-content" id="song-data-tab">
				<div class="tab-pane active" id="chords">
					<div class="row"><!--todo: store in 2d array and transfer as json -->
						<div class="col-md-9">
							<input value="Verse" id="chords_heading"/>
							<table id="chords_table">
							</table>
							<a href="#" id="chords_add_row" class="btn btn-xs btn-primary" onclick="addRow();return false;">Add row</a>
						</div>
						<div class="col-md-3">
							<br/>
							<div class="list-group" id="parts-list">
								<a href="#" class="list-group-item text-center" onclick="addPart();return false;">
									<span class="glyphicon glyphicon-plus-sign"></span> Add
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="lyrics">
					<textarea class="form-control" id="lyric_content" name="lyrics" placeholder="Type or paste lyrics here..." rows=20><?=$song['lyrics']?></textarea>
				</div>
				<div class="tab-pane" id="form">
					(Can wait)
				</div>
			</div>
			</div>
	</div>
	
	<input type="submit" class="btn btn-primary" value="Save" />
	<a href="./" class="btn btn-default">Back</a> <!--TODO: Onclick js check for changes-->
	</form>
	
</div>
<?php
}
function getJavascript(){
	$id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : -1;
?>
<script type="text/javascript">
String.prototype.repeat = function( num )
{
    return new Array( num + 1 ).join( this );
}
var chord_rows = 0;
var chord_data = new Array(); //Part id -> chord data
function addRow()
{
	var content = "";
	for(var i = 0; i < 8; i++)
		content += "<td><input class='chord_col_" + i + "' /></td>";
	content += "<td><a href='#' class='btn btn-xs btn-danger' onclick='deleteRow(\""+chord_rows+"\");return false;'>Delete</a></td>";
	$("#chords_table").append("<tr id='chord_row_" + chord_rows + "'>"+content+"</tr>");
	chord_rows++;
}
function deleteRow(id)
{
	$("#chord_row_"+id).remove();
	for(var i = id+1; $("#chord_row_"+i).length > 0;i++)
		$("#chord_row_"+i).attr("id","chord_row_"+(i-1));
	chord_rows--;
}
function clearRows()
{
	$("#chords_table").empty();
	chord_rows = 0;
}
function extractChordData() // : Chord
{
	var chord = new Object();
	chord.title = $("#chords_heading").val();
	chord.data = new Array();
	for (var row = 0; row < chord_rows; row++)
	{
		chord.data[row] = new Array();
		for (var col = 0; col < 8; col++)
			chord.data[row][col] = $("#chord_row_"+row+" .chord_col_"+col).val();
	}
	return chord;
}
function setChordData(chord) // chord : Chord
{
	$("#chords_heading").val(chord.title);
	clearRows();
	for (var row = 0; row < chord.data.length; row++)
	{
		addRow();
		for (var col = 0; col < 8; col++)
			$("#chord_row_"+row+" .chord_col_"+col).val(chord.data[row][col]);
	}
}

var num_parts = 0;
var current_part = 0;
function addPart()
{
	$("#parts-list a:last").before("<a href='#' class='list-group-item' id='parts_list_item_"+num_parts+"' onclick='clickPart("+num_parts +");return false;'>Chorus</a>");
	//chord_data[num_parts++] = new Array();
	
	//$("#parts-list a:not(:last)").
}
function deletePart(id)
{
	for(var i = id+1; i < num_parts;i++)
		chord_data[i-1] = chord_data[i];
	chord_data[num_parts-1] = null;
	num_parts--;
	//TODO: Disallow deleting last part
	clickPart(0);
}
function setParts(chords) //chords : Array(Chord)
{
	
}

function loadPart(id)
{
	if (chord_data[id] == undefined) return;
	if (chord_data[id].data != undefined)
		setChordData(chord_data[id].data);
	$("#chords_heading").unbind("change");
	$("#chords_heading").bind("change", function() {
		$("#parts_list_item_"+id+"").html($("#chords_heading").val());
	});
	current_part = id;
}

function clickPart(id)
{
	chord_data[current_part] = extractChordData();
	loadPart(id)
}

</script>

<?php
}
?>