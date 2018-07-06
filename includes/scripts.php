

<script type="text/javascript"> 

/*
var $ = jQuery.noConflict(); 
*/



<?php  if(!isset($_SESSION['preload'])){ ?>

/* PRELOAD IMAGES 	

var images = [];
function preload() {
    for (var i = 0; i < arguments.length; i++) {
        images[i] = new Image();
        images[i].src = preload.arguments[i];
    }
}

preload(

<?php
$directory="img";
$dirint = dir($directory);
$path='';
while (($archivo = $dirint->read()) !== false){
	if (preg_match("/gif/", $archivo) || preg_match("/jpg/", $archivo) || preg_match("/svg/", $archivo) || preg_match("/png/", $archivo)){
		$fileImgs = $directory."/".$archivo;
		$path.='"'.$url.$fileImgs.'",';
	}
}
$dirint->close();
$path = rtrim($path,',');
echo $path;

$_SESSION['preload'] = 'preload';
?>

);
<?php } ?>
*/


/* DETECTAR RESOLUCIÓN */
function resolution(){
	return $(window).width();
}


$(window).on('load', function(){ 


	/* PRELOAD */
  	$('#status').fadeOut(); 
  	$('#preloader').delay(550).fadeOut('slow');  
 	/*$('body').delay(250).css({'overflow':'visible'});*/

	
	function aplicarEfectoScroll(){
       let items = $('.efecto');
       let hw = $(window).height();
       let wTop = $(window).scrollTop();
       let screenH = wTop+hw;
       $.each(items,function(inx,val){
           let yPos = $(this).offset().top;
           if(yPos<=screenH){
              $(this).removeClass('efecto');
           }
       });
    }
    
    aplicarEfectoScroll();



    /* DETECTAR DISPOSITIVO */
	if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
	   $('body').addClass('mobile');
	}

    /* DATEPICKER */
    $.datepicker.regional['es'] = {
	 closeText: 'Cerrar',
	 prevText: '< Ant',
	 nextText: 'Sig >',
	 currentText: 'Hoy',
	 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	 weekHeader: 'Sm',
	 dateFormat: 'dd/mm/yy',
	 firstDay: 1,
	 isRTL: false,
	 minDate: 0,
	 showMonthAfterYear: false,
	 yearSuffix: ''
	 };
	 $.datepicker.setDefaults($.datepicker.regional['es']);
	
	$( function() {
		$( "#desde" ).datepicker();
	});
	$( function() {
		$( "#hasta" ).datepicker();
	});

    
	
    
    
	
	/* BASE JS */
	var w_body = $(window).width();
	var h_body = $(window).height();
	var cont = $('.cont').width();
	var cont_left = $(".cont").offset();
	var cont_margin = cont_left.left;
	var h_header = $('#header').outerHeight();
	var m_cont = 0;
	
	/* paddins left right */
	$('.p-left').css('padding-left', cont_margin + m_cont);
	$('.p-right').css('padding-right', cont_margin + m_cont );
	/* margins left right */
	$('.m-left').css('margin-left', cont_margin + m_cont);
	$('.m-right').css('margin-right', cont_margin + m_cont );
	/* absolute left right */
	$('.a-left').css('left', cont_margin + m_cont);
	$('.a-right').css('right', cont_margin + m_cont );
	
	/* full */
	$('.full-height').css('min-height', h_body);

	/* paddins left right */
	$('.p-left').css('padding-left', cont_margin + m_cont);
	$('.p-right').css('padding-right', cont_margin + m_cont );
	/* margins left right */
	$('.m-left').css('margin-left', cont_margin + m_cont);
	$('.m-right').css('margin-right', cont_margin + m_cont );
	/* absolute left right */
	$('.a-left').css('left', cont_margin + m_cont);
	$('.a-right').css('right', cont_margin + m_cont );

	if (resolution() < 1599 && resolution() > 1371 ) {	}

	
	
	$('#main').css('padding-top', h_header);
	
	

	/* ZOOM */
	$('.zoom').zoom({
        magnify: 1
    });


 	/* ANIMACIONES */
 	$('.cont-slider h2').delay(1000).css({'opacity':'1','left':'2.5rem'}); 

 	/* HOVER BOXs */
	$('.cols-box').mouseover(function(){
		$('.cols-box').css({
			'opacity':'0.6',
		});
		$(this).css({
			'opacity':'1',
		});
	});

	$('.cols-box').mouseout(function(){
		$('.cols-box').css({
			'opacity':'1',
			//'font-weight':'400' 
		});
	});

	$('.afiche').mouseenter(function() {
		$(this).find('.foto').css("-webkit-filter", "blur(4px)");
		})
		.mouseleave(function() {
			$(this).find('.foto').css("-webkit-filter", "blur(0px)");
    });
	
	
	
	



	/* LIGHTBOX CUSTOM */ 
	/*abrir*/
	$('.btn-ampliar').click(function(e){
		e.preventDefault();
		$('#lightbox').addClass('visible');
	});
	/*cerrar*/
	$(".close").click(function(){
		$('#lightbox').removeClass('visible');
	});
	$(document).keyup(function(e) { 
        if (e.keyCode == 27) { 
            $('#lightbox').removeClass('visible');
        }
    });
    $("#lightbox").click(function(){
		$(this).removeClass('visible');
	});
	$('.popup-custom').click(function (e) {
	    e.stopPropagation();
	});

	

	

	/* SLIDERs */
	/*
	var slide = $('.slider.inicio .owl-carousel');
	slide.owlCarousel({
		autoplay:true, 
		autoplayTimeout:3000,
		autoplayHoverPause:false,
		margin:0,
		nav:false,
		dots:true,
		items:1,
		loop: true,
		smartSpeed:3000,
		animateOut: 'fadeOut'
	});
	*/
	
	/* CON VIDEO */
	var slider_inicio = $('.slider.inicio .owl-carousel');
	slider_inicio.owlCarousel({
		  autoplay:true,
          video:true,
          lazyLoad:true,
          center:true,
		  autoplayTimeout:6000,
		  autoplayHoverPause:false,
		  loop:true,
		  margin:0,
		  nav:false,
		  dots:false,
		  items:1,
          onTranslated: function(event){
              let video = $(".active").find('.owl-video-play-icon').length;
              if(video>0){
                 slider_inicio.trigger('play.owl.video');
              }
          }
	});

    slider_inicio.on('changed.owl.carousel',function(e){
       let n = 0;
       let slides = [];
       let coleccion = slider_inicio.find('.owl-item');
       $.each(coleccion,function(inx,val){
           slides[n]=$(this);
           n++;
       });
       
       let inx = e.item.index;
       let actual = slides[inx];
       let isVideo = actual.find('.owl-video-play-icon').length>0 ? true: false;

       if(isVideo){
           actual.find('.owl-video-play-icon').click();
           slider_inicio.trigger('play.owl.video');   
       }
    });
   
    
	/* nav sliders */
	$('.slider.inicio i.prev').click(
		function(e){
		e.preventDefault();
		slider_inicio.trigger('prev.owl.carousel');
	});
	$('.slider.inicio i.next').click( 
		function(e){
		e.preventDefault();
		slider_inicio.trigger('next.owl.carousel');
	});

	/*
	  slider_inicio.on('translate.owl.carousel',function(e){
		$('.owl-item video').each(function(){
		  $(this).get(0).pause();
		});
	  });
	  slider_inicio.on('translated.owl.carousel',function(e){
		$('.owl-item.active video').get(0).play();
	  });
	*/
	  /*if(!isMobile()){*/
		$('.owl-item .item').each(function(){
		  var attr = $(this).attr('data-videosrc');
		  if (typeof attr !== typeof undefined && attr !== false) {
			console.log('hit');
			var videosrc = $(this).attr('data-videosrc');
			$(this).prepend('<div class="ratio-50"><video muted><source src="'+videosrc+'" type="video/mp4"></video></div>');
		  }
		});
		$('.owl-item.active video').attr('autoplay',true).attr('loop',true);
	 /* } */


	

	/*function isMobile(width) {
		if(width == undefined){
			width = 719;
		}
		if(window.innerWidth <= width) {
			return true;
		} else {
			return false; 
		}
	}*/
	
	
	
	var slidePadding = $('.slider.gallery .owl-carousel');
		slidePadding.owlCarousel({
		stagePadding: 50,
		loop:true,
		margin:10,
		nav:true,
		dots:false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:5
			}
		}
	});


	
	var slideWidth = $('.slider-width .owl-carousel');
		slideWidth.owlCarousel({    
		margin:10,
		loop:true,
		dots:false,
		autoWidth:true,
		items:4
	});
	


	var galeria = $('.galeria .owl-carousel');
	galeria.on('changed.owl.carousel',function(event){
		var tot = event.page.count-1;
        var tot_item = event.item.count;
        var item_pg = event.page.size;
		var act = event.page.index;		
		console.log();
        if(act <=0 || act == null){
			$('.galeria .prev').hide();
		}else{
			$('.galeria .prev').show();
		}
		
		if(act==tot && tot>=0){
			$('.galeria .next').hide();
		}else{
			$('.galeria .next').show();
		}
        
        if(tot_item<=item_pg){
           $('.galeria .prev, .galeria .next').hide();
        }
	}); 
    
	galeria.owlCarousel({
		autoplay:false, 
		loop:false,
		margin:0,
		nav:false,
		slideBy: 'page',
		items:4,
		dots:false,
		responsive :{
			360 : {
		        items:2
		    },
		    480 : {
		        items:3
		    },
		    768 : {
		        items:4
		    },
		    1024 : {
		        items:7
		    }
		}
	});
	
	/* nav sliders */
	$('.galeria i.prev').click(
		function(e){
		e.preventDefault();
		galeria.trigger('prev.owl.carousel');
	});
	$('.galeria i.next').click( 
		function(e){
		e.preventDefault();
		galeria.trigger('next.owl.carousel');
	});
	
	
	
	
	



	/* PARALLAX */
	$('.parallax').parallax({speed : 0.15});
	
	





	/* HEADER */
	$(window).scroll(function(){
		if($(window).scrollTop()>100){
			$('#header').addClass('scroll');
		}else{
			$('#header').removeClass('scroll');
		}
		
		aplicarEfectoScroll();
	});






	/* TABS */
	$('ul.tabs li').click(function(e){
		e.preventDefault();
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})
	





	/*BTN DESPLEGABLE */

	/* 1 */
	$('.btn-tx').click(function(){
		$(this).next('.caja-tx').slideToggle();
	});



	$('.btn-scroll').click(function(){
		var y = $(window).scrollTop(); 
		$("html, body").animate({ scrollTop: y + $(window).height() }, 600);
	});

	/* 2 */
	$('.btn-more').toggle(function(e){ 
		e.preventDefault();
            $('#mas-news').slideDown();
            $(this).text('Show more');
        }, 
        function(e){ 
		e.preventDefault();
            $('#mas-news').slideUp();
            $(this).text('Show more');
    });
	
	/* IR ARRIBA */
	$(".btn-subir").on('click', function(event) {
		event.preventDefault();
		$('html,body').animate({'scrollTop':2},100);
	});  	
	$(window).scroll(function(){
		if($(window).scrollTop()>400){
			$('.btn-subir').css('opacity','1')
		}else{
			$('.btn-subir').removeAttr('style')
		}
	});





	
	/* FANCYBOX */
	$('[data-fancybox]').fancybox({
		protect: true,
		loop:true,
        baseClass: "sound",
		onActivate: $.noop,
	});

	/* cambiar atributos */
	$('a[data-fancybox]').click(function(){
		$(".fancybox-button--play").attr("title","Reproducir");
		$(".fancybox-button--fullscreen").attr("title","Pantalla completa");
		$(".fancybox-button--thumbs").attr("title","Miniaturas");
		$(".fancybox-button--close").attr("title","Cerrar");
	});
	
	/* abre solo */
	$("#btn-popup").trigger('click');








	/* MASONRY */
	var $grid = $('.grid').masonry({
	  itemSelector: '.grid-item',
	  columnWidth: '.grid-sizer',
	  percentPosition: true
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
	  $grid.masonry('layout');
	});







	/* MENÚ */	
	var res = '960';
	$('.main-menu.visible').css('height', h_body);
	
	$('.btn-menu').toggle( 
        function(e){ 
		e.preventDefault();
            $('.menu').slideDown();
            $('header .col-8').css({'height':'auto','padding-bottom':'5px'});
        }, 
        function(e){ 
		e.preventDefault();
            $('.menu').slideUp();
            $('header .col-8').css({'height':'0','padding-bottom':'0'});
        }
    ); 

    
	$('.btn-menu').click(function(e) {
		e.stopPropagation();
		if (resolution() < res) {	

			var obj=$('.menu'); 
			var activo=$(obj).css('right');
			if(activo!='0'){
				$(this).hide();
				$('body').css('overflow','hidden');
				$('.main-menu').addClass('visible');
			}else{
				$(this).show();
				$('body').css('overflow','inherit');
				$('.main-menu').removeClass('visible');
			} 
		} 
	});

	$('.main-menu').click(function(e) {
		e.stopPropagation();

		if (resolution() < res) {	
			if ($(this).hasClass('visible')) {
			   $('.main-menu').removeClass('visible');
			   $('.btn-menu').show();
			   $('body').css('overflow','inherit');
		  	} 
		}

	});

	$(document).keyup(function(e) { 
        if (e.keyCode == 27) { 
			if (resolution() < res){
				$('.main-menu').removeClass('visible');
				$('.btn-menu').show();
				$('body').css('overflow','inherit');
			}
        }
    });

	$('.menu li .ico-drop').click(function(e){
		e.stopPropagation();

		if (resolution() < res){	
			if($(this).next('.sub-menu').css('display')=='none'){
				$('.sub-menu').hide();
				$(this).next('.sub-menu').show();
				$('.menu li').removeClass('act');
				$(this).parent('.menu li').addClass('act');
				$(this).addClass('activo');
			}else{
				$(this).next('.sub-menu').toggle();
				$('.menu li').removeClass('act');
				$(this).parent('.menu li').removeClass('act');
				$(this).removeClass('activo');
			}
		}

	});









	
	/* ACORDEON */
	$('.item-acordeon').click(function(){
	  if ($(this).hasClass('activo')) {
		   $(this).removeClass('activo');
		   $(this).next().slideUp();
	  } else {
		   $('.item-acordeon').removeClass('activo');
		   $(this).addClass('activo');
		   $('.acordeon .info').slideUp();
		   $(this).next().slideDown();
	  }
	});

	 
	 
	 
	 
	
	
	/* MOSTRAR OCULTAR */
	$('.titulo').click(function() {
	  if($(this).hasClass('mas')){
		  if(!$(this).hasClass('tela')){
			  if($(this).hasClass('menos')){
				  $(this).removeClass('menos');
			  }else{
				  $(this).addClass('menos');		  
			  }
		  }
		  $(this).find('ul').toggle();
	  }
	});
	





	/* CAMBIAR ATTR */
	$('article h1').contents().unwrap().wrap('<h2>');
	$('article h4 strong span').contents().unwrap().wrap('');
	$('article span, article strong, article h2, article h3, article h4, article h5, article h6, article p').removeAttr('style');
	
	



    /* ADJUNTOS */
    $(".adjuntos[href$='.doc']").addClass('doc');
    $(".adjuntos[href$='.docx']").addClass('doc');
    $(".adjuntos[href$='.xls']").addClass('xls');
    $(".adjuntos[href$='.xlsx']").addClass('xls');
    $(".adjuntos[href$='.pdf']").addClass('pdf');	
    $(".adjuntos[href$='.jpg']").addClass('jpg');
    $(".adjuntos[href$='.zip']").addClass('zip');
   



	
	/* REISIZE */	
	$(window).resize(function(){
		
		/* BASE JS */
		var w_body = $(window).width();
		var h_body = $(window).height();
		var cont = $('.cont').width();
		var cont_left = $(".cont").offset();
		var cont_margin = cont_left.left;
		var h_header = $('#header').outerHeight();
		var m_cont = 0;
		
		/* paddins left right */
		$('.p-left').css('padding-left', cont_margin + m_cont);
		$('.p-right').css('padding-right', cont_margin + m_cont );
		/* margins left right */
		$('.m-left').css('margin-left', cont_margin + m_cont);
		$('.m-right').css('margin-right', cont_margin + m_cont );
		/* absolute left right */
		$('.a-left').css('left', cont_margin + m_cont);
		$('.a-right').css('right', cont_margin + m_cont );
		
		/* full */
		$('.full-height').css('min-height', h_body);

		/* paddins left right */
		$('.p-left').css('padding-left', cont_margin + m_cont);
		$('.p-right').css('padding-right', cont_margin + m_cont );
		/* margins left right */
		$('.m-left').css('margin-left', cont_margin + m_cont);
		$('.m-right').css('margin-right', cont_margin + m_cont );
		/* absolute left right */
		$('.a-left').css('left', cont_margin + m_cont);
		$('.a-right').css('right', cont_margin + m_cont );

		if (resolution() < 1599 && resolution() > 1371 ) {	}
		
		$('#main').css('padding-top', h_header);


	});	




	
	var header = h_header;
	
	$(document).on("scroll", onScroll);
    
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - header
        }, 900, 'swing', function () {
           window.history.pushState("","", ''+target.replace('#',''));
            $(document).on("scroll", onScroll);
        });
    });
    
    /* SCROLL */
	<? if(isset($pg)){?>
	$('a[href="#<?=$pg?>"]').click();
	<? } ?>


});

function onScroll(event){

	var header = 80;
	var scrollPos = $(document).scrollTop();
	
	/*$('#menu li a').each(function(){

		var currLink = $(this);
		var refElement = $(currLink.attr("href"));
		
		if (refElement.offset().top <= scrollPos && refElement.offset().top + refElement.outerHeight() > scrollPos){
			$('.menu li a').removeClass("active");
			currLink.addClass("active");
		}
		else{
			currLink.removeClass("active");
		}
	});*/
	
	$('section').each(function(){
		var id = '#'+$(this).attr('id');

		if($(this).offset().top-header <= scrollPos && ($(this).offset().top + $(this).outerHeight()-header) > scrollPos){
			$('.menu li a').removeClass('active');
			$('.menu li a[href="'+id+'"]').addClass('active');
		}
	});
}



</script>

