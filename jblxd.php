
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="57x57" href="resources/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="resources/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="resources/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="resources/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="resources/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="resources/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="resources/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="resources/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="resources/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="resources/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="resources/favicons/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="resources/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="resources/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="resources/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="resources/favicons/manifest.json">
    <link rel="mask-icon" href="resources/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="resources/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#1da2db">

    <title>LXD management interface</title>

    <!-- Bootstrap core CSS -->
    <link href="resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <!-- Bayton additional CSS -->
    <link href="resources/css/bayton.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php include "modules/nav.php" ?>

<?php
  require( "helpers/init.php" );
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  require( "connectors/lxd2.php");
?>

<div class="container">
<div class="row">
<div class="col-md-4">
<?php  
  require( "modules/lxd2-functioncalls.php");
?>
</div>
</div>
</div>
	
<div class="container page-top">
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">					
			<div class="panel-body">
				<div class="search-form">
					<div class="row">
						<div class="col-md-9">
						  <div class="form-group">
							  <div class="col-md-7">
								  <input type="text" class="form-control" placeholder="Container name...">
							  </div>
							  <div class="col-md-5">
								  <select class="form-control">
									  <option>Select...</option>
									  <option>Ubuntu 16.04 LTS</option>
									  <option>Ubuntu 15.10</option>
									  <option>Ubuntu 14.04 LTS</option>
									  <option>Debian Jessie</option>
									  <option>CentOS 7</option>
								  </select>
							  </div>
						  </div>
						</div>
						<div class="col-md-3">
							<a class="btn btn-primary btn-block" href="/companies/add" data-toggle="modal" data-target="#editModal">
								<i class="fa fa-plus"></i> 
								<span>Add</span>
							</a>
						</div>
					</div>						    
				</div>				
			</div>
		</div>
	</div>
</div>	

<!-- The grid view and modals -->
<?php include "modules/jblxd-grid.php" ?>
<!-- The table view and status message -->
<!--?php include "jblxd-table.php" ?-->

<div class="row">
	<div class="col-md-12">
	<?php
	 prp( $s );

	?>
	</div>
</div>

<!-- /.container --></div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/bootstrap/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/resources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
