$('input[data-update]').bind('keyup',function(){
	$('.js-update').html($(this).val()); 
});

//console.log($('input[data-update]'));  