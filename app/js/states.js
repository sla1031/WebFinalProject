app.config(['$routeProvider',
        function($routeProvider) {
            $routeProvider.
                    when('/', {
						templateUrl: 'app/partials/home.html',
						controller: 'CommandController'
                    }).
                    when('/news', {
						templateUrl: 'app/partials/news.html',
						controller: 'CommandController'
                    }).
					when('/internal', {
						templateUrl: 'app/partials/internal.html',
						controller: 'intNewsCtrl'
	                }).
					when('/internal-create', {
						templateUrl: 'app/partials/create-internal.html',
						controller: 'createInternalCtrl'
	                }).
					when('/internal/:param', {
						templateUrl: 'app/partials/view-internal.html',
						controller: 'viewInternalCtrl'
					}).
					when('/personnel', {
						templateUrl: 'app/partials/personnel.html',
						controller: 'employeeCtrl'
		            }).
					when('/personnel-create', {
						templateUrl: 'app/partials/create-personnel.html',
						controller: 'createPersonnelCtrl'
		            }).
					when('/personnel/:param', {
						templateUrl: 'app/partials/view-personnel.html',
						controller: 'viewPersonnelCtrl'
					}).
                    otherwise({
						redirectTo: '/'
                    });
        }
]);