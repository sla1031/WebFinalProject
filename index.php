<!DOCTYPE html>
<html ng-app="imperialCommandApp">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Imperial Command</title>
	
	<!--angular app-->
	<script type="text/javascript" src="app/js/angular.js"></script>
	<script type="text/javascript" src="app/js/angular-route.min.js"></script>
	<script type="text/javascript" src="app/js/ui-bootstrap-0.14.2.min.js"></script>
	<script type="text/javascript" src="app/js/app.js"></script>
	<script type="text/javascript" src="app/js/states.js"></script>
	<link rel="stylesheet" href="app/css/style.css" />
	<link rel="stylesheet" href="app/css/bootstrap.min.css" />
	
	<!--feed reader-->
	<!--http://siddii.github.io/angular-feeds/app/-->
	<script
type="text/javascript"
src="https://www.google.com/jsapi?autoload=%7B%22modules%22%3A%5B%7B%22name%22%3A%22feeds%22%2C%22version%22%3A%221.0%22%2C%22nocss%22%3Atrue%7D%5D%7D"></script>
	<script type="text/javascript" src="app/js/angular-feeds.js"></script>
	
	<!--Notifications -->
	<script src="app/js/angular-ui-notification.min.js"></script>  
	<link rel="stylesheet" href="app/css/angular-csp.css">
	<link rel="stylesheet" href="app/css/angular-ui-notification.min.css">
	
	</noscript>
	
</head>
<body ng-controller="CommandController as cmd">





<div id="wrapper" class="container">
	 <nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" ng-init="navCollapsed = true" ng-click="navCollapsed = !navCollapsed">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--<a class="navbar-brand" href="#">Project name</a>-->
		</div>
		<div class="collapse navbar-collapse" uib-collapse="navCollapsed">
			<ul class="nav navbar-nav">
				<li><a href="#/">Home</a></li>
				<li><a href="#/news">Galactic News</a></li>
				<li><a href="#/internal">Internal News</a></li>
				<li><a href="#/personnel">Personnel Management</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</nav>
	
	<div id="content" class="col-xs-12" ng-view>
	
	</div>
	<div id="footer">
		
	</div>

</div>


</body>
</html>
