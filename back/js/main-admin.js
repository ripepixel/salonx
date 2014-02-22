$('document').ready(function() {

    $('#side-menu').metisMenu();

	// fade out success messages
	$('.fadeout').fadeOut(4000);

//Loads the correct sidebar on window load
    $(function() {

        $(window).bind("load", function() {
            console.log($(this).width())
            if ($(this).width() < 753) {
                $('.navbar-top-links').addClass('collapse')
            } else {
                $('.navbar-top-links').removeClass('collapse')
            }
        })
    })

//Collapses the sidebar on window resize
    $(function() {

        $(window).bind("resize", function() {
            console.log($(this).width())
            if (this.innerWidth < 768) {
                $('.navbar-top-links').addClass('collapse')
            } else {
                $('.navbar-top-links').removeClass('collapse')
            }
        })
    });

    var allchecked = false;
    $(".btn-chk").click(function() {
        if (allchecked) {
            allchecked = false;
            $('input:checkbox').prop('checked', 0);
        } else {
            allchecked = true;
            $('input:checkbox').prop('checked', 1);
        }
    });

	
});

