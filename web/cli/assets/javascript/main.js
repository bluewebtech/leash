$(window).resize(function() {
	$('#content').height($(window).height() - $('#content').offset().top - 15);
});
$(window).resize();

$('#content').terminal('cli.php', 
	{custom_prompt : "&#35; ", hello_message : 'CLI : Type \'help\' or \'?\' for help.'}
);

$( '#clear' ).click( function () { 
	window.location.reload();
});

$( '#config' ).click( function () { 
	$("#command").val( 'config ' ); 
	$("#command").focus();
});

$( '#create_controller' ).click( function () { 
	$("#command").val( 'create-controller ' );
	$("#command").focus();
});

$( '#create_model' ).click( function () { 
	$("#command").val( 'create-model ' ); 
	$("#command").focus();
});

$( '#create_service' ).click( function () { 
	$("#command").val( 'create-service ' ); 
	$("#command").focus();
});

$( '#create_unit_test' ).click( function () { 
	$("#command").val( 'create-unit-test ' ); 
	$("#command").focus();
});

$( '#create_view' ).click( function () { 
	$("#command").val( 'create-view ' ); 
	$("#command").focus();
});

$( '#examples' ).click( function () { 
	$("#command").val( 'examples ' ); 
	$("#command").focus();
});

$( '#generate_all' ).click( function () { 
	$("#command").val( 'generate-all ' ); 
	$("#command").focus();
});

$( '#help' ).click( function () { 
	$("#command").val( 'help ' ); 
	$("#command").focus();
});

$( '#version' ).click( function () { 
	$("#command").val( 'version ' ); 
	$("#command").focus();
});