<!DOCTYPE html>
<html ng-app="imperialCommandApp">
<head>
	<title>Imperial Command</title>
	
	<!--angular app-->
	<script type="text/javascript" src="app/js/angular.js"></script>
	<script type="text/javascript" src="app/js/angular-route.min.js"></script>
	<script type="text/javascript" src="app/js/app.js"></script>
	<script type="text/javascript" src="app/js/states.js"></script>
	<link rel="stylesheet" href="app/css/structure.css" />
	<link rel="stylesheet" href="app/css/style.css" />
	
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
	
	<!--menu-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

	<!-- adapt -->
	<noscript>
	<link rel="stylesheet" href="app/css/adapt/mobile.min.css" />
	</noscript>
	<script>
	// Edit to suit your needs.
	var ADAPT_CONFIG = {
	  // Where is your CSS?
	  path: 'app/css/adapt/',
	
	  // false = Only run once, when page first loads.
	  // true = Change on window resize and page tilt.
	  dynamic: true,
	
	  // First range entry is the minimum.
	  // Last range entry is the maximum.
	  // Separate ranges by "to" keyword.
	  range: [
	    '0px    to 760px  = mobile.min.css',
	    '760px  to 980px  = 720.min.css',
	    '980px  to 1280px = 960.min.css',
	    '1280px to 1600px = 1200.min.css',
	    '1600px to 1940px = 1560.min.css',
	    '1940px to 2540px = 1920.min.css',
	    '2540px           = 2520.min.css'
	  ]
	};
	</script>
	<script src="app/js/adapt.min.js"></script>
	
	
</head>
<body ng-controller="CommandController as cmd">
<div class="container_12">
	<div id="wrapper" class="grid_12">
		<div id="nav">
			<label for="toggle-mobile-menu">&#9776; Menu</label>
			<input id="toggle-mobile-menu" type="checkbox"/>
			<ul>	
				<li><a href="#/">Home</a></li>
				<li><a href="#/news">Galactic News</a></li>
				<li><a href="#/internal">Internal News</a></li>
				<li><a href="#/personnel">Personnel Management</a></li>
			</ul>
		</div>
		<div id="content" ng-view>
		
		</div>
		<div id="footer">
			
		</div>
	</div>
</div>
</body>
</html>
