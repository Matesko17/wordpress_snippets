<?php
add_action( 'wp_footer', 'change_class_application_moment' );


function change_class_application_moment() {
?>
<script>
jQuery(function($){
	
	var offset = 50;
	var $header = $('#main-header');
	
	// Override the addClass to prevent fixed header class from being added before offset reached
    	var addclass = $.fn.addClass;
    	$.fn.addClass = function(){
        	var result = addclass.apply(this, arguments);
		if ($(window).scrollTop() < offset) {
			$header.removeClass('et-fixed-header');
		}
		return result;
	}

	// Remove fixed header class initially
	$header.removeClass('et-fixed-header');
	
	// Create waypoint which adds / removes fixed header class when offset reached
	$('body').waypoint({
		handler: function(d) {
			$header.toggleClass('et-fixed-header',(d==='down'));
		},
		offset: -offset
	});
	
});
</script>
<?php
}