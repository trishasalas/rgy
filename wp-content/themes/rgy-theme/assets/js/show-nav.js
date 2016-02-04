(function ( $ ) {
    $( ".nav-icon" ).click(function() {
        $( ".main-navigation" ).slideToggle( "slow", function() {
            // Animation complete.
        });
    });

}(jQuery));