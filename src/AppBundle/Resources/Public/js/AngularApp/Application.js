'use strict';

// Declare app level module which depends on views, and components
angular.module('App', [
    'ngAnimate',
    'ngTouch',
    'ui.bootstrap',
    'ngRoute',
    'internationalPhoneNumber',
    'AppControllers',
    'AppServices'
])

.config(function($interpolateProvider, ipnConfig) {

    //Change Angular quotes
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');

    ipnConfig.skipUtilScriptDownload = true;
    ipnConfig.autoFormat = false;
    ipnConfig.autoPlaceholder = false;
    ipnConfig.preferredCountries = ["us"];
    ipnConfig.nationalMode = false;
});