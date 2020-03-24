$('.menu-bar').on('click', function() {
	$('.contenidoMenu').toggleClass('abrir');
});

$(document).ready(function() {
    $(window).scroll(function(){
            if(document.body.scrollTop > 300)
                    $('#fixmenu').fadeIn( "slow", function() { });
            else    
                    $('#fixmenu').fadeOut( "slow", function() { });
    });

    $('a#srolltotop').click(function(){
            $('html, body').animate({scrollTop:0}, 100);
            return false;
    });
});
