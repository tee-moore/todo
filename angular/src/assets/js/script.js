$(window).load(function() {

    $( "body" ).click(".button-edit", function(event) {
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        event.stopPropagation();
        // $('select').formSelect();
    });

});


