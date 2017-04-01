<?php

?>
<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- Angular Material style sheet -->
		<link rel="stylesheet" href="/src/css/material/material.css">
		<!-- app style sheet -->
		<link rel="stylesheet" href="/app/css/style.css">
		<base href="/" />
		<title>Hello world!</title>
	</head>
	<body ng-app="simpleApp" ng-cloak>
		<!-- HTML -->
		
		<div ng-controller="myCtrl" >
			{{generateCardSet()}}
			{{shuffle(cardSet)}}
			
			<p>Card set with shuffle</p>
			<table >
				<tr>
					<th>Index</th>
					<th>Card name</th>
					<th>Image from url</th>
					<th>Image from data</th>
					<th>Image from object</th>
				</tr>
				<tr ng-repeat="card in cardSet track by $index" class="" >
					<td>{{$index+1}}</td>
					<td>{{card.name}}</td>
					<td><img src="{{card.url}}" /></br>{{card.url}}</td>
					<td><img src="/images/cards/{{card.suit}}/{{card.rank}}.jpg" /></br>/images/cards/{{card.suit}}/{{card.rank}}.jpg</td>
					<td><img src="/images/cards/{{cardSet[$index].suit}}/{{cardSet[$index].rank}}.jpg" /></br>/images/cards/{{cardSet[$index].suit}}/{{cardSet[$index].rank}}.jpg</td>
				</tr>
			</table>
			
			</br>
			</br>
			<p>Card set without shuffle</p>
			<table >
				<tr>
					<th>Index</th>
					<th>Card name</th>
					<th>Image from object url</th>
					<th>Image from object data</th>
				</tr>
				<tr ng-repeat="card in cardSetA track by $index" class="" >
					<td>{{$index+1}}</td>
					<td>{{cardSetA[$index].name}}</td>
					<td><img src="{{cardSetA[$index].url}}" /></br>{{cardSetA[$index].url}}</td>
					<td><img src="/images/cards/{{cardSetA[$index].suit}}/{{cardSetA[$index].rank}}.jpg" /></br>/images/cards/{{cardSetA[$index].suit}}/{{cardSetA[$index].rank}}.jpg</td>
				</tr>
			</table>
			
			<p>{{testFn()}}</p>
			
		</div>
		
		<!-- Angular Material requires Angular.js Libraries -->
		<script src="/src/js/angular/angular.min.js"></script>
		<script src="/src/js/angular/angular-animate.min.js"></script>
		<script src="/src/js/angular/angular-aria.min.js"></script>
		<script src="/src/js/angular/angular-messages.min.js"></script>
		<script src="/src/js/angular/angular-route.min.js"></script>
		
		<!-- Angular Material Library -->
		<script src="/src/js/material/material.js"></script>
		
		<!-- Application JS source  -->
		<script src="/app/js/module.js"></script>
		<script src="/app/js/config.js"></script>
		<script src="/app/js/directive.js"></script>
		<script src="/app/js/controller.js"></script>
		
	</body>
</html>