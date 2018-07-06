

<script type="text/javascript"> 
		
function resolution(){
	return $(window).width();
}

	
	
$(document).ready(function() {
	
	var w_body = $(window).width();
	var h_body = $(window).height();
	var cont = $('.cont').width();
	var h_header = $('header').outerHeight();
	var cont_margin = (w_body - cont) /2;
	var header = $('#header').height();
    
    
    /* URL ACTIVE */
	var url = window.location.href;
	$('.menu li a[href="'+ url +'"]').addClass('active');
	$('.menu li a').filter(function() {
		return this.href == url;
	}).addClass('active');
	
    

	/* HEADER */ 
	$(window).scroll(function(){
		
		if($(window).scrollTop()> 200){
			$('.cabezal').addClass('fixed');
		} else {
			$('.cabezal').removeClass('fixed');
		}
		
		
	});


	
	
	/* BUSCAR */
	$('.buscar').toggle( 
        function(e){ 
		e.preventDefault();
            $('.search').addClass('mostrar');
            $(this).addClass('close');
        }, 
        function(e){ 
		e.preventDefault();
            $('.search').removeClass('mostrar');
            $(this).removeClass('close');
        }
    );

	
	/*CKEDITOR.replace('editor1');

	CKEDITOR.editorConfig = function( config ) {
		config.language = 'es';
		config.uiColor = '#F7B42C';
		config.height = 300;
		config.toolbarCanCollapse = true;
	};*/

	$('.item-acordeon').click(function(){
		  if ($(this).hasClass('activo')) {
			   $(this).removeClass('activo');
			   $(this).next().slideUp();
		  } else {
			   $('.item-acordeon').removeClass('activo');
			   $(this).addClass('activo');
			   //$('.acordeon .info').slideUp();
			   $(this).next().slideDown();
		  }
	 });


	$('.btn-guardar').click(function(e){  
		e.preventDefault();
		$('#guardar').click();
		console.log('click!');
	});

	$('.btn-guardar-salir').click(function(e){  
		e.preventDefault();
		$('#guardar-salir').click();
		console.log('click!');
	});
	
	
	
	
	$('.btn-more').toggle( 
        function(e){ 
		e.preventDefault();
            $('#mas-news').slideDown();
            $(this).text('Show more');
        }, 
        function(e){ 
		e.preventDefault();
            $('#mas-news').slideUp();
            $(this).text('Show more');
        }
    );
	
	
	
	
	
});
 


</script>
