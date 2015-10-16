var app = angular.module('imperialCommandApp', ['ngRoute','feeds','ui-notification','ui.bootstrap']);


app.controller('CommandController', [function(){
	$phpPath = "https://php.radford.edu/~sashley2/itec425/php/";

}]);



app.controller('employeeCtrl', function($scope, $http) {
    $http.get($phpPath + "users/allUsers.php")
    .success(function (response) {$scope.names = response.records;});
});



app.controller('intNewsCtrl', function($scope, $http) {
    $http.get($phpPath + "memos/allMemos.php")
    .success(function (response) {$scope.memos = response.records;});
});


app.controller('createPersonnelCtrl', function($scope, $http, Notification){

	
	$scope.submit = function(isValid) {
		if(isValid){
			$createURL = $phpPath + "users/createUser.php?name=" + $scope.user.name + "&title=" + $scope.user.title + "&department=" + $scope.user.department + "&wage=" + $scope.user.wage;
			$http.get($createURL)
			.success(function() {
				Notification.success({message: 'Personnel added.', delay: 3000});
				$scope.user = {};
				$scope.createPersonnel.$setPristine();
				
				});
		}
		else {
			Notification.error({message: 'Invalid Data.', delay: 3000});
		}
		
	};
	
});

app.controller('viewPersonnelCtrl', function($scope, $http, Notification, $routeParams){
	$scope.param = $routeParams.param;
	
	$scope.url = $phpPath + "users/getUser.php?user=" + $scope.param;
	$http.get($scope.url)
    .success(function (response) {
	$scope.users = response.records;
	$scope.user ={
		name: $scope.users[0].name,
		title: $scope.users[0].title,
		department: $scope.users[0].department,
		wage: $scope.users[0].wage
	}
	});
	

	$scope.submit = function(isValid) {
		if(isValid){
			$createURL = $phpPath + "users/updateUser.php?name=" + $scope.user.name + "&title=" + $scope.user.title + "&department=" + $scope.user.department + "&wage=" + $scope.user.wage + "&id=" + $scope.param;
			$http.get($createURL)
			.success(function() {
				Notification.success({message: 'Personnel Updated.', delay: 3000});
				$scope.editPersonnel.$setPristine();
			});
		}
		else {
			Notification.error({message: 'Invalid Data.', delay: 3000});
		}

	};

});

app.controller('viewInternalCtrl', function($scope, $http, Notification, $routeParams){
	$scope.param = $routeParams.param;


	$scope.url = $phpPath + "memos/getMemo.php?memo=" + $scope.param;
	$http.get($scope.url)
    .success(function (response) {
	$scope.memos = response.records;
	
	$scope.memo ={
		user: $scope.memos[0].user,
		datePublished: $scope.memos[0].datePublished,
		subject: $scope.memos[0].subject,
		text: $scope.memos[0].text
	}
	});


	
});



app.controller('createInternalCtrl', function($scope, $http, Notification){

	$scope.memo = {};

	
	$scope.submit = function(isValid) {
		if(isValid){
			$createURL = $phpPath + "memos/createMemo.php?subject=" + $scope.memo.subject + "&text=" + $scope.memo.text;
			$http.get($createURL)
			.success(function() {
				Notification.success({message: 'Internal News added.', delay: 3000});
				_subject = "";
				_text = "";
				});
		}
		else {
			Notification.error({message: 'Invalid Data.', delay: 3000});
		}
		
	};
	
});

