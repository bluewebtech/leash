$(document).ready(function(){

	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#top').fadeIn();	
		} else {
			$('#top').fadeOut();
		}
	});
 
	$('#top').click(function() {
		$('body,html').animate({scrollTop:0},300);
	});

	$('pre code').each(function(i, e) {hljs.highlightBlock(e)});

	// -- Search text field
	$( 'input#search' ).each( function() {
	    var default_value = this.value;

	    $( this ).css( 'color', '#A1A1A1' );

	    $( this ).focus( function() {
	       
	        if( this.value == default_value ) {
	            this.value = '';
	            $( this ).css( 'color', '#333333' );
	        }

	    });

	    $( this ).blur( function() {
	        
	        if( this.value == '' ) {
	            $( this ).css( 'color', '#A1A1A1' );
	            this.value = default_value;
	        }

	    });
	});

});
