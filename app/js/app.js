var app = angular.module('imperialCommandApp', ['ngRoute','feeds','ui-notification']);

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
	
	var _name = "";
	var _title = "";
	var _department = "";
	var _wage = "";
	$scope.user = {
	    name: function(newName) {
	      if (angular.isDefined(newName)) {
	        _name = newName;
	      }
	      return _name;
	    },
	
		title: function(newTitle) {
	      if (angular.isDefined(newTitle)) {
	        _title = newTitle;
	      }
	      return _title;
	    },
		department: function(newDepartment) {
	      if (angular.isDefined(newDepartment)) {
	        _department = newDepartment;
	      }
	      return _department;
	    },
	
		wage: function(newWage) {
	      if (angular.isDefined(newWage)) {
	        _wage = newWage;
	      }
	      return _wage;
	    },
	
	  };

	
	$scope.submit = function() {
		if($scope.user.name()  != ""){
			$createURL = $phpPath + "users/createUser.php?name=" + $scope.user.name() + "&title=" + $scope.user.title() + "&department=" + $scope.user.department() + "&wage=" + $scope.user.wage();
			$http.get($createURL)
			.success(function() {
				Notification.success({message: 'Personnel added.', delay: 3000});
				_name = "";
				_title = "";
				_department = "";
				_wage = "";	
				});
		}
		else {
			Notification.error({message: 'Invalid Data.', delay: 3000});
		}
		
	};
	
});

app.controller('viewPersonnelCtrl', function($scope, $http, Notification, $routeParams){
	$scope.param = $routeParams.param;
	var _name;
	var _title;
	var _department;
	var _wage;
	
	$scope.url = $phpPath + "users/getUser.php?user=" + $scope.param;
	$http.get($scope.url)
    .success(function (response) {
	$scope.users = response.records;
		_name = $scope.users[0].name;
		_title = $scope.users[0].title;
		_department = $scope.users[0].department;
		_wage = $scope.users[0].wage;
	});
	
	$scope.user = {
	    name: function(newName) {
	      if (angular.isDefined(newName)) {
	        _name = newName;
	      }
	      return _name;
    	},

		title: function(newTitle) {
	      if (angular.isDefined(newTitle)) {
	        _title = newTitle;
	      }
	      return _title;
	    },
		department: function(newDepartment) {
	      if (angular.isDefined(newDepartment)) {
	        _department = newDepartment;
	      }
	      return _department;
	    },

		wage: function(newWage) {
	      if (angular.isDefined(newWage)) {
	        _wage = newWage;
	      }
	      return _wage;
	    }

	};


	$scope.submit = function() {
		if($scope.user.name()  != ""){
			$createURL = $phpPath + "users/updateUser.php?name=" + $scope.user.name() + "&title=" + $scope.user.title() + "&department=" + $scope.user.department() + "&wage=" + $scope.user.wage() + "&id=" + $scope.param;
			$http.get($createURL)
			.success(function() {
				Notification.success({message: 'Personnel Updated.', delay: 3000});
			});
		}
		else {
			Notification.error({message: 'Invalid Data.', delay: 3000});
		}

	};

});

app.controller('viewInternalCtrl', function($scope, $http, Notification, $routeParams){
	$scope.param = $routeParams.param;
	$scope.user;
	$scope.datePublished;
	var _subject;
	var _text;

	$scope.url = $phpPath + "memos/getMemo.php?memo=" + $scope.param;
	$http.get($scope.url)
    .success(function (response) {
	$scope.memos = response.records;
		$scope.user= $scope.memos[0].user;
		$scope.datePublished= $scope.memos[0].datePublished;
		_subject = $scope.memos[0].subject;
		_text = $scope.memos[0].text;
	});

	$scope.memo = {
	    subject: function(newSubject) {
	      if (angular.isDefined(newSubject)) {
	        _subject = newSubject;
	      }
	      return _subject;
    	},
		text: function(newText) {
		  if (angular.isDefined(newText)) {
		    _text = newText;
		  }
		  return _text;
		}

	};


	$scope.submit = function() {
		if($scope.memo.text()  != ""){
			$createURL = $phpPath + "memos/updateMemo.php?subject=" + $scope.memo.subject() + "&text=" + $scope.memo.text() + "&id=" + $scope.param;
			$http.get($createURL)
			.success(function() {
				Notification.success({message: 'Memo Updated.', delay: 3000});
			});
		}
		else {
			Notification.error({message: 'Invalid Data.', delay: 3000});
		}

	};
	
});



app.controller('createInternalCtrl', function($scope, $http, Notification){
	
	var _subject = "";
	var _text = "";
	$scope.memo = {
	    subject: function(newSubject) {
	      if (angular.isDefined(newSubject)) {
	        _subject = newSubject;
	      }
	      return _subject;
    	},
		text: function(newText) {
		  if (angular.isDefined(newText)) {
		    _text = newText;
		  }
		  return _text;
		}

	};

	
	$scope.submit = function() {
		if($scope.memo.text()  != ""){
			$createURL = $phpPath + "memos/createMemo.php?subject=" + $scope.memo.subject() + "&text=" + $scope.memo.text();
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

