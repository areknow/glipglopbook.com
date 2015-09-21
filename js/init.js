$(function() {
  
  //init circles
  aboutCircleSize();
  moveNubbin(activeTab(),"snap");
  
//  $('select').material_select();
  
  $('#started').parallax({
    speed: 0.2,
    bleed: 30,
    naturalWidth: 1440,
    naturalHeight: 960,
    iosFix: true,
    androidFix: true,
    imageSrc: 'res/parallax/baloons.jpg'
  });
  
  //about button click
  $("#btn-about1").click(function(event){showTab(1);});
  $("#btn-about2").click(function(event){showTab(2);});
  $("#btn-about3").click(function(event){showTab(3);});
  
      
  //open search bar
  $("#btn-search").click(function(event){
    event.preventDefault();
    if ( $(this).hasClass("isDown") ) {
      $("#search-input").stop().animate({width:"0"}, 100);    
      $("#btn-search").removeClass('white-button');
    } 
    else {
      $("#search-input").stop().animate({width:"150"}, 100, function() {
        $("#search-input").focus();                
        $("#btn-search").addClass('white-button');           
      });
    }
    $(this).toggleClass("isDown");
    return false;
  });
  
  
  //account drop down
  $("#btn-account").click(function() {
    event.preventDefault();
    if ( $(".drop-down-login").hasClass("isDown") ) {
      $(".drop-down-login").fadeToggle();
      $(".drop-down-login").removeClass("isDown");
      $("#btn-account").removeClass('white-button');
    } 
    else {
      $(".drop-down-login").fadeToggle();
      $(".drop-down-login").addClass("isDown");
      $("#btn-account").addClass('white-button');
    }
    return false;
  });
  
  
  
  //close button clicks on body event
  $(document).click(function(e){
    if( $(e.target).closest("#search-cont").length > 0 ) {
      return false;
    }
    if( $(e.target).closest(".drop-down-login").length > 0 ) {
      return false;
    }
    if ( $("#btn-search").hasClass("isDown") ) {
      $("#btn-search").click();
    }
    if ( $(".drop-down-login").hasClass("isDown") ) {
      $("#btn-account").click();
    }
  });


  
  
  

  //side nav init
  $('.button-collapse').sideNav({
      menuWidth: 300,
      edge: 'left', 
      closeOnClick: true
    }
  );


  
  
  
  
  //home page slider
  $('.owl-carousel').owlCarousel({
    loop:true,
    nav:false,
    autoplay:true,
    autoplayTimeout:7000,
    items:1
  });
  
  
  
  
  //anchor scroll
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
    && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000, 'easeInOutExpo');
        return false;
      }
    }
  });
  
  
  
  //animate on scroll initiate
//  new WOW().init();
  
});












$(window).resize(function() {
  aboutCircleSize();
  moveNubbin(activeTab(),"snap");
});
  
  
  
  
  
  
  
  
  
  

function aboutCircleSize() {
  $(".about-circle").height($(".about-circle").width());
  
}
function hideTabs() {
  for (x = 1; x < 4; x++) { 
    $('#about-tab'+x).hide();
    $('#about-tab'+x).removeClass('active-tab');
    $('#btn-about'+x).removeClass('active-circle');
  }
}
function showTab(i) {
  hideTabs();
  $('#about-tab'+i).fadeIn();
  $('#about-tab'+i).addClass('active-tab');
  $('#btn-about'+i).addClass('active-circle');
  moveNubbin(i,"anim");
}
function activeTab() {
  for (x = 1; x < 4; x++) { 
    if ($('#about-tab'+x).hasClass('active-tab'))
      return x;
  }
}
function moveNubbin(i,type) {
  var offset = $('#btn-about'+i).offset();
  var width = $('#btn-about'+i).width();
  if(type=="anim") {
    $('.nubbin').animate({
      left: offset.left + ((width/2)-6)
    });
  }
  if(type=="snap") {
    $('.nubbin').css({
      left: offset.left + ((width/2)-6)
    });
  }
}