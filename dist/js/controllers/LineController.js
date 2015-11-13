(function(angular){
	var app = angular.module('SM');

	app.controller('LineController', ['UserService', '$location', '$scope', function(UserService, $location, $scope){
	}]);
})(angular);

// external js: packery.pkgd.js

var notifElem;

$( function() {
  notifElem = $('#notification')[0];
  
  var $container = $('.packery').packery();
  
  $container.on( 'layoutComplete', function( event, laidOutItems ) {
    console.log( 'Packery layout completed on ' + laidOutItems.length + ' items' );
  });

  $container.on( 'click', '.item', function( event ) {
    // change size of item via class
    $( event.target ).toggleClass('gigante');
    // trigger layout
    $container.packery();
  });


});
