'use strict';

angular.module('AppServices').service('UtilPhoneService', function($rootScope) {

    return {
        isValidPhoneNumber: function(phonenumber){
            if(phonenumber && phonenumber.length > 6){
                return true;
            }
            return false;
        }
    }
});