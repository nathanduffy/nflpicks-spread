function MatchController($scope){
	$scope.matches = nflMatches;
	
	$scope.getTeamsInMatch = function(match){
		return [match.homeTeam, match.awayTeam];
	}
	
	$scope.selectTeam = function(team, match){
		match.homeTeam.selected = false;
		match.awayTeam.selected = false;
		team.selected = true;
	}
}