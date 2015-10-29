$(function() {
  
  
  
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
  
  
  
  
  
  
  
  
  
  //FORM ACTIONS (started,modal)//
  
  //enable enter key stroke for first form
  $("#frm-started-mini").keypress(function (e) {
    if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
      $('#btn-modal1').click();
    }
  });
  
  $('#input-started-email').keyup(function() {
    var val = $('#input-started-email').val();
     console.log(val);                        
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
  
  
  //home contact form ajax post
  $("#btn-login").click(function(){
    var mydata = $("form.drop-down-login").serialize();
    $.ajax({
        type: "POST",
        url: "php/login.php",
        data: mydata,
        success: function(response, textStatus, xhr) {
          response==true && console.log('good');
          if (response=="true") {
            $('.invalid').slideUp();
            location.href="dashboard";
          }
          else {
            $('.invalid').slideDown('fast');
          }
        },
        error: function(xhr, textStatus, errorThrown) {}
    });
    return false;
  });
  
  
  
  
  
  
  
});//end doc ready














//functions to execute on window resize
$(window).resize(function() {
  aboutCircleSize();
  moveNubbin(activeTab(),"snap");
});















