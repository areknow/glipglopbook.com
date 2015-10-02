$(function() {
  
  //profile form
  $("#btn-profile-save").click(function(){
    
    if($("input#email").hasClass('invalid')) {
      Materialize.toast('Invalid email', 4000);
    }
    else {
      var mydata = $("form#frm-profile").serialize();
      $.ajax({
          type: "POST",
          url: "../php/update-profile.php",
          data: mydata,
          success: function(response, textStatus, xhr) {
            console.log(response);
            if (response=="true") {
              Materialize.toast('Profile saved', 4000);
            }
            else {
              Materialize.toast('Error saving', 4000);
            }
          },
          error: function(xhr, textStatus, errorThrown) {}
      });
    }
    return false;
  });
});