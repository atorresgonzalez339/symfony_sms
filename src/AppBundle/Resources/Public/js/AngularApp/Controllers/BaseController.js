'use strict';

// Declare app level module which depends on views, and components
angular.module('AppControllers', []).controller('BaseController', function($rootScope) {
    console.log('Base Controller');
    $rootScope.spinner = false;
});