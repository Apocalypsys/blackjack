app.controller("myCtrl",function($scope,$http)
	{
		$scope.suits = ["Hearts","Diamonds","Clubs","Spades"];
		$scope.ranks = ["Ace","King","Queen","Jack","Ten","Nine","Eight","Seven","Six","Five","Four","Three","Two"];
		$scope.games = ["Blackjack","fool","thousand"];
		
		$scope.cardSet = [];
		$scope.cardSetA = [];
		
		//Card set for blackjack (52)
		$scope.generateCardSet = function()
			{
				var k = 0;
				for(var i = 0; i < $scope.suits.length; i++)
					{
						for(var j = 0; j < $scope.ranks.length; j++)
							{
								$scope.url = "/images/cards/"+$scope.suits[i]+"/"+$scope.ranks[j]+".jpg";
								$scope.rank = $scope.ranks[j];
								$scope.suit = $scope.suits[i];
								$scope.name=$scope.ranks[j]+" of "+$scope.suits[i];
								$scope.cardSet[k] ={"name":$scope.name,"rank":$scope.rank,"suit":$scope.suit,"url":$scope.url};
								$scope.cardSetA[k] = {"name":$scope.name,"rank":$scope.rank,"suit":$scope.suit,"url":$scope.url};
								k++;
							}
					}
			};
		
		$scope.shuffle = function(array)
			{
				var currentIndex = array.length, temporaryValue, randomIndex ;
				// While there remain elements to shuffle... 
				while (0 !== currentIndex)
					{ 
						// Pick a remaining element... 
						randomIndex = Math.floor(Math.random() * currentIndex); currentIndex -= 1; 
						// And swap it with the current element. 
						temporaryValue = array[currentIndex];
						array[currentIndex] = array[randomIndex];
						array[randomIndex] = temporaryValue;
					}
				//return array;
			};
		$scope.testFn = function()
			{
			};
	});