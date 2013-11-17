<?php
$show = (isset($_GET['show']) && preg_match("/[a-z]+/",$_GET['show'])) ? $_GET['show'] : 'search';
$action = (isset($_GET['action']) && preg_match("/[a-z]+/",$_GET['action'])) ? $_GET['action'] : '';
include("php/util.php");

if (file_exists("php/$show.php"))
	include("php/$show.php");
else
	include("php/error.php");

?>

<html>
<head>
<title>Chords</title>
<meta charset="iso-8859-1">
<link rel="shortcut icon" href="img/icon.png">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="./css/styles.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="./">Chords</a>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li class="<?=($show == 'search')?'active':''?>"><a href="./?show=search">Search</a></li>
		<li class="<?=($show == 'browse')?'active':''?>"><a href="./?show=browse">Browse</a></li>
		<li class="<?=($show == 'edit')?'active':''?>"><a href="./?show=edit">New</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="./?action=logout">Log out</a></li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</div>

<div class='container'>
	<div class='row'>
		<?php
			getContent();
		?>
	</div>
</div>

<script type="text/javascript" src="./js/script.js"></script>
<script type="text/javascript">
	<?php
		getJavascript();
	?>
</script>
</body>
</html>
