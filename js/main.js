function MatchController($scope, $http){
	$scope.matches = nflMatches;
	
	$scope.getTeamsInMatch = function(match){
		return [match.homeTeam, match.awayTeam];
	}
	
	$scope.selectTeam = function(team, match){
		match.homeTeam.selected = false;
		match.awayTeam.selected = false;
		team.selected = true;
	}

	$scope.testURL = function(team, match){
		var url = "php/score-update.php";
	
		$http({method: 'GET', url: url}).
  			success(function(data, status, headers, config) {
		    	alert(data);
		  	}).
		  	error(function(data, status, headers, config) {
		    	alert("There was an error accessing ESPN for live scores.")
		  	});
	}
}