$(function() {
  
//animate on scroll initiate
new WOW().init();
  
  
//NAVIGATION BAR ACTIONS//
  
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
  //enter key search
  $('#search-input').keypress(function (e) {
    var key = e.which;
      if(key == 13) {
      var query = $('#search-input').val();  
      window.location = "../search/?q="+query;
    }
  });
  
  
  //account drop down
  $("#btn-account").click(function(event) {
    event.preventDefault();
    if ( $(".drop-down-login").hasClass("isDown") ) {
      $(".drop-down-login").fadeToggle();
      $(".drop-down-login").removeClass("isDown");
      $("#btn-account").removeClass('white-button');
      $(".login-overlay").toggle();
    } 
    else {
      $(".drop-down-login").fadeToggle();
      $(".drop-down-login").addClass("isDown");
      $("#btn-account").addClass('white-button');
      $(".login-overlay").toggle();
    }
    return false;
  });
  
  //close account login drop down with overlay click
  $(".login-overlay").click(function(){
    $("#btn-account").click();
  });
  $("#btn-new-account-link").click(function(){
    $("#btn-account").click();
  });
  
  //close search on body click
  $(document).click(function(e){
    if( $(e.target).closest("#search-cont").length > 0 ) {
      return false;
    }
    if ( $("#btn-search").hasClass("isDown") ) {
      $("#btn-search").click();
    }
  }); 
  
  //side nav init
  $('.button-collapse').sideNav({
      menuWidth: 300,
      edge: 'left', 
      closeOnClick: true
    }
  );
  
  //side nav accordion slidetoggle and anim
  $(".collapse-header").click(function(){
    $(".collapse-menu").slideToggle();
    if (!$(".collapse-header").hasClass('active')) {
      $(".collapse-header .material-icons").css('-webkit-transform','rotate(-180deg)'); 
    }
    else {
      $(".collapse-header .material-icons").css('-webkit-transform','rotate(0deg)');
    }
    $(".collapse-header").toggleClass('active');
    
  });
  
  
  
  
  //anchor based smooth scroll
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
    && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top+30
        }, 1000, 'easeInOutExpo');
        return false;
      }
    }
  });
  
  
  
  
});




















//FUNCTIONS//
  
//about circle heights
function aboutCircleSize() {
  $(".about-circle").height($(".about-circle").width());
  
}
//hide all tab content
function hideTabs() {
  for (x = 1; x < 4; x++) { 
    $('#about-tab'+x).hide();
    $('#about-tab'+x).removeClass('active-tab');
    $('#btn-about'+x).removeClass('active-circle');
  }
}
//show tab
function showTab(i) {
  hideTabs();
  $('#about-tab'+i).fadeIn();
  $('#about-tab'+i).addClass('active-tab');
  $('#btn-about'+i).addClass('active-circle');
  moveNubbin(i,"anim");
}
//return active tab number
function activeTab() {
  for (x = 1; x < 4; x++) { 
    if ($('#about-tab'+x).hasClass('active-tab'))
      return x;
  }
}
//move triangle nub
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


String.prototype.trunc = function(n){
  return this.substr(0,n-1)+(this.length>n?'&hellip;':'');
};