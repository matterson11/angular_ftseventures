<?php
date_default_timezone_set('Europe/London');
?>

<!DOCTYPE html>
<html ng-app="project">
<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FTSE Ventures</title>
    <link type="text/css" rel="stylesheet" href="css/website.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-resource.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.min.js"></script>
	
	<script src="project.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
	    $(document).ready( function () {
	        $('#directors_buying').DataTable();
	    } );

	    $(document).ready( function () {
	        $('#directors_selling').DataTable();
	    } );
	</script>


</head>
<body>
<div class="container">
    <nav class="navbar navbar-custom navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#/">FTSE Ventures</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#/">Home</a></li>
                <li><a href="#/dealing">Director Dealings</a></li>
                <li><a href="#/about">About</a></li>
            </ul>
        </div>
    </nav>
</div>
		<!-- Angular Project -->
<div ng-view></div>


<footer class="footer">
    <div class="container">
        <div class="row">
            <ul class="nav navbar-centered navbar-nav">
                <li><a href="#/">Main Page</a></li>
                <li><a href="#/dealing">Director Dealings</a></li>
            </ul>
        </div>
    </div>
</footer>
