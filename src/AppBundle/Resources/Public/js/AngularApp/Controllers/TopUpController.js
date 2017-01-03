'use strict';

// Declare app level module which depends on views, and components
angular.module('AppControllers').controller('TopUpController', function ($scope, $timeout) {

    $scope.data = {
        phone: '+53',
        country: "cu",
        operator: "",
        quantity: "",
    };

    $scope.$watch('data.phone', function(newValue, oldValue){
        if(newValue != oldValue){
            $scope.data.operator = "";
            $scope.data.quantity = "";
        }
    })

    $timeout(function(){
        $('li.country').click(function(){
            var country_selected = $(this);
            if (country_selected && country_selected.length) {
                $('#phoneNumber').val('+' + country_selected.attr('data-dial-code'));
            }
        });
    });

    $scope.isAValidPhoneNumber = function(){
        if($scope.data.phone && $scope.data.phone.length > 6 && $scope.topUpForm.phone.$valid){
            return true;
        }
        else{
            return false;
        }
    };

    $scope.isAValidOperator = function(){
        if($scope.isAValidPhoneNumber() && $scope.data.operator){
            return true;
        }
        else{
            return false;
        }
    };

    $scope.isAValidQuantity = function(){
        if($scope.isAValidPhoneNumber() && $scope.isAValidOperator && $scope.data.quantity){
            return true;
        }
        else{
            return false;
        }
    };

    $scope.processTopUp = function () {
        var country_selected = $('li.country.active');
        if (country_selected && country_selected.length) {
            $scope.country = country_selected.attr('data-country-code');
            if($scope.isAValidQuantity()){
                console.log($scope.data.phone + ' Is a valid number');
                console.log($scope.data);
            }
            else{
                console.log($scope.data.phone + ' Is an invalid number');
            }
        }
        else{
            console.log('Country error.');
        }
    }
});