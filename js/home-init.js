$(function() {
  
  
  
  //init circles
  aboutCircleSize();
  
  //snap nub to active circle
  moveNubbin(activeTab(),"snap");
  
  
  //parallax init for get started section background
  $('#started').parallax({
    speed: 0.2,
    bleed: 40,
    naturalWidth: 1440,
    naturalHeight: 960,
    iosFix: true,
    androidFix: true,
    imageSrc: 'res/parallax/baloons.jpg'
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
    $("#chk-started-modal-agree").attr('checked', false);
    $("#input-modal-firstname").val("");
    $("#input-modal-lastname").val("");
    $("#input-modal-email").val("");
    $("#input-modal-password").val("");
    $("#btn-modal1").prop("disabled", true);
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
  
  
  
  // home nav bar search click
  $('#btn-home-nav-search').click(function(){
    $("#inpt-mini-search").focus();
  });
  
  
  
  $('#btn-modal-book-buy').click(function(){
    var id = this.getAttribute('book-id');
    openBuyModal(id);
    $('#modal-book').closeModal();
    $('#modal-buy').openModal();
  });
  $('#btn-modal-book-buy-login').click(function(){
    $('#modal-book').closeModal();
    $('#modal-warning').openModal();
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
  
  
  //home form ajax post
  $("#btn-login").click(function(){
    var mydata = $("form.drop-down-login").serialize();
    $.ajax({
        type: "POST",
        url: "php/login.php",
        data: mydata,
        success: function(response, textStatus, xhr) {
          console.log(response);
          if (response=="true") {
            $('.invalid').slideUp();
            location.href="books";
          }
          else {
            $('.invalid').slideDown('fast');
            $(".drop-down-login input").val('');
          }
        },
        error: function(xhr, textStatus, errorThrown) {}
    });
    return false;
  });
  
  // hide error on input click
  $(".drop-down-login input").focusin(function() {
    $('.invalid').slideUp();
  });
  
  
  // search input keyup hook
  $("#inpt-mini-search").keyup(function(e) {
    clearTimeout($.data(this, 'timer'));
    var search_string = $(this).val();
    if (search_string == '') {
      $("ul#results").fadeOut();
      $('h4#results-text').fadeOut();
      $(".search-close").fadeOut();
      $('#inpt-mini-search').removeClass('mini-search-bg');
    } else {
      $(".search-close").fadeIn();
      $("ul#results").fadeIn();
      $('h4#results-text').fadeIn();
      $(this).data('timer', setTimeout(search, 100));
      $('#inpt-mini-search').addClass('mini-search-bg');
    };
  });
  
  $(".search-close").click(function() {
    $(this).fadeOut();
    $("ul#results").fadeOut();
    $("ul#results").empty();
    $("#inpt-mini-search").val('');
    $('#inpt-mini-search').removeClass('mini-search-bg');
  });
  
  
  if (checkBrowser()!="Firefox") {
    //smooth page scroll
    var $window = $(window);
    var scrollTime = .2;
    var scrollDistance = 170;
    $window.on("mousewheel DOMMouseScroll", function(event){
      event.preventDefault();	
      var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
      var scrollTop = $window.scrollTop();
      var finalScroll = scrollTop - parseInt(delta*scrollDistance);
      TweenMax.to($window, scrollTime, {
        scrollTo : { y: finalScroll, autoKill:true },
        ease: Power1.easeOut,
        overwrite: 5							
      });
    }); 
  }
  
});//end doc ready














//functions to execute on window resize
$(window).resize(function() {
  aboutCircleSize();
  moveNubbin(activeTab(),"snap");
});





// main search function passes string to php and gets results
function search() {
  var query_value = $('#inpt-mini-search').val();
  console.log("search string: "+query_value);
  if(query_value !== ''){
    $.ajax({
      type: "POST",
      url: "php/search-book.php",
      data: { query: query_value },
      cache: false,
      success: function(html){
        $("ul#results").html(html);
      }
    });
  }return false;    
}




//validate get started mini form and check for existing email
function checkForm() {
  var firstname = $("#input-started-firstname").val();
  var lastname = $("#input-started-lastname").val();
  var email = $("#input-started-email").val();
  var password = $("#input-started-password").val();
  var fieldsAreFilled = false;
  
  if(firstname=="" || lastname=="" || email=="" || password=="")
    fieldsAreFilled = false;
  if (firstname!="" && lastname!="" && email!="" && password!="")
    fieldsAreFilled = true;
  
  if(email!="" && !isValidEmailAddress(email)) {
    $("label[for='input-started-email']").text('Email not valid');
    $("label[for='input-started-email'], #icon-email-check").addClass('red-label');
    $("#input-started-email").addClass('invalid');
  } else {
    $.ajax( {
      type: "POST",
      url: "php/check-email.php",
      cache: false,
      dataType: 'json',
      data: {email:email},
      success: function(result) {
        console.log(result);
        if(result.exists=="true") {
          console.log(email+" exists");
          $("label[for='input-started-email']").text('Email already exists');
          $("label[for='input-started-email'], #icon-email-check").addClass('red-label');
          $("#input-started-email").addClass('invalid');
        } else {
          console.log(email+" free");
          $("label[for='input-started-email']").text('Email');
          $("label[for='input-started-email'], #icon-email-check").removeClass('red-label');
          $("#input-started-email").removeClass('invalid');
        }
        if(result.exists=="false" && fieldsAreFilled==true) {
          $('#btn-modal1').prop("disabled", false);
        } else {
          $('#btn-modal1').prop("disabled", true);
        }
      }
    });
  }
  

}



// book click opens modal and gets book info from DB
function openBookModal(bookid) {
  $.ajax( {
      type: "POST",
      url: "php/get-book.php",
      data: {bookid:bookid},
      cache: false,
      dataType: 'json',
      success: function(result){
        console.log(result);
        $('#modal-book .modal-header').html(result.title);
        $('#inpt-modal-book-title').val(result.title);
        $('#inpt-modal-book-author').val(result.author);
        $('#inpt-modal-book-category').val(result.category);
        $('select').material_select();
        $('#inpt-modal-book-pub').val(result.publisher);
        $('#inpt-modal-book-price').val(result.price);
        $('#inpt-modal-book-isbn').val(result.isbn);
        $("#modal-book .preview").css('background-image','url('+result.img+')');
      }
    });
  $('#modal-book').openModal();
  $('#btn-modal-book-buy').attr('book-id',bookid);
}


function openBuyModal(bookid) {
  $('#txt-modal-buy-message').val('');
  $("label[for='txt-modal-buy-message']").removeClass('active');
  console.log(bookid);
  $.ajax( {
    type: "POST",
    url: "php/get-book.php",
    data: {bookid:bookid},
    cache: false,
    dataType: 'json',
    success: function(result){
      console.log(result);
      $('#modal-buy .title').text(result.title);
      $('#modal-buy .author').text(result.author);
      $('#modal-buy .isbn').text(result.isbn);
      $('#modal-buy-price').text(result.price);
      $('#inpt-hide-book').val(bookid);
      $('#inpt-hide-owner').val(result.owner);
      console.log(result.owner);
      $.ajax( {
        type: "POST",
        url: "php/get-owner.php",
        data: {id:result.owner},
        cache: false,
        dataType: 'json',
        success: function(result){
          console.log(result);
          $('#modal-buy-user').text(result.first+" "+result.last);
          $('#modal-buy-campus').text(result.campus);
        }
      });
    }
  });
}


function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};


function checkBrowser(){
  c=navigator.userAgent.search("Chrome");
  f=navigator.userAgent.search("Firefox");
  m8=navigator.userAgent.search("MSIE 8.0");
  m9=navigator.userAgent.search("MSIE 9.0");
  if (c>-1){
      brwsr = "Chrome";
  }
  else if(f>-1){
      brwsr = "Firefox";
  }else if (m9>-1){
      brwsr ="MSIE 9.0";
  }else if (m8>-1){
      brwsr ="MSIE 8.0";
  }
  else {
      brwsr ="other";
  }
  return brwsr;
}