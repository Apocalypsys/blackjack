//username validator
app.directive('usernameCustomValidator', function() {
	return {
		require : 'ngModel',
		link : function(scope, element, attr, ctrl) {
			function customValidator(value) {
				if(value.length < 3) {
					ctrl.$setValidity('short',false);
				}else{
					ctrl.$setValidity('short',true);
				};
				if(value.length > 10) {
					ctrl.$setValidity('long',false);
				}else{
					ctrl.$setValidity('long',true);
				};
				if(scope.namesList.indexOf(value) == -1){
					ctrl.$setValidity('sql',true);
				}else{
					ctrl.$setValidity('sql',false);
				};
				return value;
			};
		ctrl.$parsers.push(customValidator);
		}
	};
});

//email validator
app.directive('emailCustomValidator', function() {
	var regexp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return {
		require : 'ngModel',
		link : function(scope, element, attr, ctrl) {
			if(ctrl && ctrl.$validators.email){
				ctrl.$validators.email = function(value){
					return ctrl.$isEmpty(value) || regexp.test(value);
				};
			};
			function customValidator(value) {
				if(scope.emailsList.indexOf(value) == -1){
					ctrl.$setValidity('sql',true);
				}else{
					ctrl.$setValidity('sql',false);
				};
				return value;
			};
		ctrl.$parsers.push(customValidator);
		}
	};
});

//password custom validator
app.directive('passwordCustomValidator', function() {
	return {
		require : 'ngModel',
		link : function(scope, element, attr, ctrl) {
			function customValidator(value) {
				if(value.length < 6) {
					ctrl.$setValidity('short',false);
				}else{
					ctrl.$setValidity('short',true);
				};
				if(/[0-9]/.test(value)){
					ctrl.$setValidity('digitsContains',true);
				}else{
					ctrl.$setValidity('digitsContains',false);
				};
				if(/[a-z]/.test(value)){
					ctrl.$setValidity('lowercaseContains',true);
				}else{
					ctrl.$setValidity('lowercaseContains',false);
				};
				if(/[A-Z]/.test(value)){
					ctrl.$setValidity('uppercaseContains',true);
				}else{
					ctrl.$setValidity('uppercaseContains',false);
				};
				return value;
			};
		ctrl.$parsers.push(customValidator);
		}
	};
});

//passwords match
app.directive('passwordCheck', function() {
	return {
		require : 'ngModel',
		link : function(scope, element, attr, ctrl) {
			function customValidator(value) {
				if(value == scope.userData.password){
					ctrl.$setValidity('notMatch',true);
				}else{
					ctrl.$setValidity('notMatch',false);
				};
				return value;
			};
		ctrl.$parsers.push(customValidator);
		}
	};
});