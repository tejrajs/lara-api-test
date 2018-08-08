<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">

  		<script src="lib/angular/angular.min.js"></script>
  		<script src="lib/angular/angular-route.min.js"></script>

  		<link rel="stylesheet"; href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
		<script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>

  		<script src="js/app.js"></script>
    </head>
    <body ng-app="myApp">
   		@verbatim
       	<div ng-view></div>
        @endverbatim
	<footer class="footer">
		<div class="container">
			<span class="text-muted">Place sticky footer content here.</span>
		</div>
	</footer>
	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/bootstrap/popper.min.js"></script>
	<script src="lib/bootstrap/bootstrap.min.js"></script>
</body>
</html>
