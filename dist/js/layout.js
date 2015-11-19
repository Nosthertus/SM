$(function(){
	var $container = $('.packery').packery();

	$container.on('layoutComplete', function(event, laidOutItems){
		console.log( 'Packery layout completed on ' + laidOutItems.length + ' items' );
	});

	$container.on( 'click', '.item', function(event){
		if($(event.target).parent().hasClass('z1')){
			$(event.target).parent().toggleClass('a1');

		}

		if($(event.target).parent().hasClass('z2')){
			$(event.target).parent().toggleClass('a2');
		}

		if($(event.target).parent().hasClass('z3')){
			$(event.target).parent().toggleClass('a3');
		}
		$container.packery();
	});
});
