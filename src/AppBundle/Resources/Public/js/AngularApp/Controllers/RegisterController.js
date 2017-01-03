'use strict';

// Declare app level module which depends on views, and components
angular.module('AppControllers')
    .controller('RegisterController', function ($scope, $timeout, UtilPhoneService) {

    $scope.phone_number = '+1';
    $scope.country = 'us';

    $timeout(function () {
        $('li.country').click(function () {
            var country_selected = $(this);
            if (country_selected && country_selected.length) {
                $('#form_phone_number').val('+' + country_selected.attr('data-dial-code'));
            }
        });
    });

    $scope.isAValidPhoneNumber = function () {
        if ($scope.data.phone && $scope.data.phone.length > 6 && $scope.topUpForm.phone.$valid) {
            return true;
        }
        else {
            return false;
        }
    };


    $scope.register = function () {
        var country_selected = $('li.country.active');
        if(country_selected && country_selected.length){
            $scope.country = country_selected.attr('data-country-code');
        }
        console.log($scope.phone_number);
        console.log($scope.country);

        // if (country_selected && country_selected.length) {
        //     $scope.country = country_selected.attr('data-country-code');
        //     if($scope.isAValidQuantity()){
        //         console.log($scope.data.phone + ' Is a valid number');
        //         console.log($scope.data);
        //     }
        //     else{
        //         console.log($scope.data.phone + ' Is an invalid number');
        //     }
        // }
        // else{
        //     console.log('Country error.');
        // }
    }
});