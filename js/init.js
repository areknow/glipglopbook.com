$(function() {
  
  //animate on scroll initiate
//  new WOW().init();
  
  //init circles
  aboutCircleSize();
  
  //snap nub to active circle
  moveNubbin(activeTab(),"snap");
  
  
  //parallax init for get started section background
  $('#started').parallax({
    speed: 0.2,
    bleed: 30,
    naturalWidth: 1440,
    naturalHeight: 960,
    iosFix: true,
    androidFix: true,
    imageSrc: 'res/parallax/baloons.jpg'
  });
  
  
  
  
  
  
  
  
  
  
  
  
  
  
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
  
  
  
  
  
  
  
  
  
  
  
  
  
//FORM ACTIONS (started,modal)//
  
  //enable enter key stroke for first form
  $("#frm-started-mini").keypress(function (e) {
    if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
      $('#btn-modal1').click();
    }
  });
  
  //home page modal
  $("#btn-modal-started-cancel").click(function(){  
    $("#input-started-firstname").val("");
    $("#input-started-firstname").focusout();
    $("#input-started-lastname").val("");
    $("#input-started-lastname").focusout();
    $("#input-started-email").val("");
    $("#input-started-email").focusout();
    $("#input-started-password").val("");
    $("#input-started-password").focusout();
    $('#chk-started-modal-agree').attr('checked', false);
    $("#input-modal-firstname").val("");
    $("#input-modal-lastname").val("");
    $("#input-modal-email").val("");
    $("#input-modal-password").val("");
    $('#btn-modal1').prop("disabled", true);
  });
  
  //open modal and pass variables to new account modal
  $("#btn-modal1").click(function(event){  
    var firstname = $("#input-started-firstname").val();
    var lastname = $("#input-started-lastname").val();
    var email = $("#input-started-email").val();
    var password = $("#input-started-password").val();
    $("#input-modal-firstname").val(firstname);
    $("#input-modal-lastname").val(lastname);
    $("#input-modal-email").val(email);
    $("#input-modal-password").val(password);
    $('#modal1').openModal();
  });
  
  //validate new account form
  $( "#modal1" ).validate({
    errorPlacement: function(error,element) {
      return true;
    },
    rules: {
      first: "required",
      last: "required",
      password: {
       required: true
      },
      confirm_password: {
       required: true,
       equalTo: "#input-modal-password"
      },
      email: {
       required: true,
       email: true
      }
    }
  });
  
  //terms checkbox toggle
  $('#chk-started-modal-agree').click(function () {
    if ($(this).is(':checked')) {
      $('#btn-modal-started-continue').removeAttr('disabled'); //enable input
    } else {
      $('#btn-modal-started-continue').attr('disabled', true); //disable input
    }
  });
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  //about button clicks to show tabs
  $("#btn-about1").click(function(event){showTab(1);});
  $("#btn-about2").click(function(event){showTab(2);});
  $("#btn-about3").click(function(event){showTab(3);});
  
  
  
  //links section input focus css hack
  $(".links input").focusin(function() {
    $(".links .input-wrapper").css('color','#26a69a');
  });
  $(".links input").focusout(function() {
    $(".links .input-wrapper").css('color','#fff');
  });
  
  
  
  
  
  
  
  //home page slider hero init
  $('.owl-carousel').owlCarousel({
    loop:true,
    nav:false,
    autoplay:true,
    autoplayTimeout:7000,
    items:1
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
  
  
  
  
  
});//end doc ready











//functions to execute on window resize
$(window).resize(function() {
  aboutCircleSize();
  moveNubbin(activeTab(),"snap");
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
//validate get started mini form
function checkForm() {
  var firstname = $("#input-started-firstname").val();
  var lastname = $("#input-started-lastname").val();
  var email = $("#input-started-email").val();
  var password = $("#input-started-password").val();
  if(firstname!="" && lastname!="" && email!="" && password!="") {
    $('#btn-modal1').prop("disabled", false);
  }
   else {
     $('#btn-modal1').prop("disabled", true);
   }
}