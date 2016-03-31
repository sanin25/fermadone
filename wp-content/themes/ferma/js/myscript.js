jQuery(document).ready(function($) {
jQuery.fn.exist = function() {
   return $(this).length;
}
  function setHeiHeight() {
      $('.heigh').css({
          height: $(window).height() + 'px'
      });
  }
  setHeiHeight(); // устанавливаем высоту окна при первой загрузке страницы
  $(window).resize( setHeiHeight ); // обновляем при изменении размеров окна

/*Конец высоты*/
/*Текст к картинкам контакты*/

	var tit = $('.hidetxt').text();
  	$('.acted').append( tit );
  

  $('.foto img').hover(function() {
  	var tit = $(this).attr('hidetitle');
  	 $('.acted').hide().empty();
  	$('.acted').show().append( tit );
  	
  });

  /*Паралакс*/
  $(window).scroll(function() {
  var par = $(this).scrollTop();
  /*Лого*/
  $("#logo").css({
  	"transform" :"translate3d(0px , " + par /2 + "%, .0px)",
  	"-webkit-transform" : "translate3d(0px , " + par /2 + "%, .0px)",
  	"-moz-transform" : "translate3d(0px , " + par /2 + "%, .0px)"

  });
  /*Облока*/
  if($('.cont4').exist()){
  var cont4 = $('.cont4').offset().top - par;
  if( cont4 < 250){
    
  	$('.kyri').css('visibility', 'visible').addClass('animated bounceInLeft');
    
  var i = $('.cont4').offset().top - par;
  $("#obl1").css({
  	 "transform" :"translate3d(" + i / 2 + "%," + i/8  + "%, 0px)",
    "-webkit-transform" : "translate3d(" + i * 1 + "%, 0%, .0px)",
    "-moz-transform" : "translate3d(" + i / 2 + "%, "+ i/8  +"%, 0px)"
  	});
   $("#obl2").css({
  	"right" :"" + par /60 + "%",
  	});
  }
  }
/* Конец облока*/

  if($('.cont5').exist()){
  var cont5 = $('.cont5').offset().top - par;
    if( cont5 < 250){
    
    $('.gusi').css('visibility', 'visible').addClass('animated bounceInRight');
    
  }
  }
      if($('.cont6').exist()){
          var cont6 = $('.cont6').offset().top - par;
          if( cont6 < 250){

              $('.pavlin').css('visibility', 'visible').addClass('animated bounceInRight');

          }
      }

  
  if ($(this).scrollTop() > 300) {
          $('.fotoin').css('visibility', 'visible').addClass('animated bounceInLeft');
          $('.textunber').css('visibility', 'visible').addClass('animated bounceInRight');
          $('.foto h3').css('visibility', 'visible').addClass('animated bounceInUp');
      }
  });
  /* Форма отправки письма*/
  $('#emailform').click(function() {
    $('.semdmail').animate({
      marginRight: '0px'},
      400);
  });
  $('#close').click(function() {
     $('.semdmail').animate({
      marginRight: '-500px'},
      700);
  });

    $('#konimg').click(function() {
    $('.kontackt').animate({
      right: '0px'},
      400);
    $('#close2').css('display', 'block');
  });
      $('#close2').click(function() {
     $('.kontackt').animate({
      right: '-400px'},
      700);
     $(this).css('display', 'none');
  });
  /*Слайдер*/
  
    $('.bxslider').bxSlider({
		   minSlides: 4,
    	  maxSlides: 4,
    	  slideWidth: 600,
    	  slideMargin: 5,
    	  ticker: true,
    	  speed: 49000

    	});
    /*Отправка письма*/

    $("#form").submit(function() {
    $.ajax({
      type: "POST",
      url: "/wp-admin/admin-ajax.php",
      data: $(this).serialize()
    }).done(function(vot) {
      
      alert(vot);
      $("#form")[0].reset();
      $('.semdmail').animate({
      marginRight: '-500px'},
      700);
    });
    return false;
  });

  $('img').addClass('responsive-img');
});