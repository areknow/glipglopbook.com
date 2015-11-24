$(function() {
  
  $('select').material_select();
  
  // get user id from body attr
  var userid = document.body.getAttribute("user-id");
  console.log("user: "+userid);
  loadBooks(userid);
  
  // open new book modal
  $("#btn-book-add").click(function(event){ 
    clearModal();
    $('#modal-add-books').openModal();
  });
  
  // new book form, find book details with ISBN
  $("#btn-get-book").click(function() {
    var isbn = $("#inpt-isbn").val();
    isbn2 = isbn.replace('-', '');
    console.log(isbn2);
    $.ajax( {
      type: "POST",
      url: "../php/amazon-find.php",
      data: {isbn:isbn2},
      cache: false,
      dataType: 'json',
      success: function(result){
        console.log(result);
        if (result.error) {
          console.log('no book');
          $("#inpt-isbn").addClass('invalid');
          $(".lbl-isbn-error").show();
        }
        else {
          $("#inpt-isbn").addClass('valid');
          $("#inpt-isbn").removeClass('invalid');
          $(".lbl-isbn-error").hide();
          console.log('book found');
          var title = result.title[0];
          var author = result.author[0];
          var publisher = result.publisher[0];
          var price = "N/A";
          if (result.lownewprice) {
            price = result.lownewprice[0];
          }
          var coverUrl = result.img[0];
          $("label[for='inpt-book-title']").addClass('active');
          $("#inpt-book-title").val(title);
          $("label[for='inpt-book-author']").addClass('active');
          $("#inpt-book-author").val(author);
          $("label[for='inpt-book-pub']").addClass('active');
          $("#inpt-book-pub").val(publisher);
          $("label[for='inpt-book-price']").addClass('active');
          $("#inpt-book-price").val(price);
          $("label[for='inpt-book-isbn']").addClass('active');
          $("#inpt-book-isbn").val(isbn2);
          $(".books .preview").css('background-image','url('+coverUrl+')');
        }
      }
    });
  });
  // 'enter' key press and keyup
  $('#inpt-isbn').keyup(function (e) {
    $('#btn-get-book').click();
  });
  $('#inpt-isbn').keypress(function (e) {
   var key = e.which;
   if(key == 13) {
      $('#btn-get-book').click();
      return false;  
    }
  });
  
  
  
  // save new book
  $("#btn-modal-book-save").click(function() {
    var title = $('#inpt-book-title').val();
    var author = $('#inpt-book-author').val();
    var category = $('#inpt-book-category option:selected').val();
    var pub = $('#inpt-book-pub').val();
    var price = $('#inpt-book-price').val();
    var isbn = $('#inpt-book-isbn').val();
    var owner = $('#inpt-book-owner').val();
    var img = $(".books .preview").css('background-image');
    img = img.replace('url(','').replace(')','');
    img = img.replace('"','').replace('"','');
    console.log(img);
    if (!title || !author || !pub || !isbn || !price) {
      if (!title) {$('#inpt-book-title').addClass('invalid');} 
      else {$('#inpt-book-title').removeClass('invalid');}
      if (!author) {$('#inpt-book-author').addClass('invalid');} 
      else {$('#inpt-book-author').removeClass('invalid');}
      if (!pub) {$('#inpt-book-pub').addClass('invalid');} 
      else {$('#inpt-book-pub').removeClass('invalid');}
      if (!price) {$('#inpt-book-price').addClass('invalid');} 
      else {$('#inpt-book-price').removeClass('invalid');}
      if (!isbn) {$('#inpt-book-isbn').addClass('invalid');} 
      else {$('#inpt-book-isbn').removeClass('invalid');}
    } else {
      $.ajax( {
        type: "POST",
        url: "../php/insert-book.php",
        data: {title:title,author:author,category:category,pub:pub,price:price,isbn:isbn,owner:owner,img:img},
        success: function(result) {
          console.log(result);
          $('#modal-add-books').closeModal();
          Materialize.toast('Book added', 4000);
          loadBooks(userid);
        }
      });
    }
  });

  
  
  // save book changes
  $("#btn-modal-modify-book-save").click(function() {
    var id = this.getAttribute('book-id');
    var title = $('#inpt-mod-book-title').val();
    var author = $('#inpt-mod-book-author').val();
    var category = $('#inpt-mod-book-category option:selected').val();
    var pub = $('#inpt-mod-book-pub').val();
    var price = $('#inpt-mod-book-price').val();
    var isbn = $('#inpt-mod-book-isbn').val();
    $.ajax( {
      type: "POST",
      url: "../php/update-book.php",
      data: {bookid:id,title:title,author:author,category:category,pub:pub,price:price,isbn:isbn},
      success: function(result) {
        console.log(result);
        loadBooks(userid)
        $('#modal-modify-books').closeModal();
        Materialize.toast('Book updated', 4000);
      }
    });
  });
  
  
  
  // edit book modal delete button
  $("#btn-modal-modify-book-delete").click(function() {
    var id = this.getAttribute('book-id');
    openWarning(id);
  });

  
  // warning modal delete button click
  $("#modal-warning-delete").click(function() {
    var id = this.getAttribute('book-id');
    $('#modal-warning').closeModal();
    deleteBook(id);
  });
  

  
  

  
  
});//end doc ready







// loads all user books
function loadBooks(userid) {
  $.ajax({
    type: 'POST',
    url: '../php/load-book.php',
    data: {userid:userid},
    dataType: 'json',
    cache: false,
    success: function(result) {
      console.log(result);
      $('.book-cont').empty();
      $('.book').tooltip('remove');
      for (i = 0; i < result.length; i++) {
        var title = result[i].title;
        title = title.replace("'", "");
        title = title.trunc(60);
        $('.book-cont').append(
          $("<div id='"+result[i].bookid+"' class='book-wrapper'>")
          .append(
            $("<div book-id='"+result[i].bookid+"' class='book tooltipped z-depth-1' onclick='editBookModal("+result[i].bookid+")' style='background-image: url("+result[i].img+")' data-tooltip='"+title+"' data-position='top'>")
          ).append("<i class='material-icons closer' onclick='openWarning("+result[i].bookid+")'>close</i>"));
        $('.book').tooltip({delay: 0});
        $(".closer").attr('book-id',result[i].bookid);
      }
    }
  });
}




// edits and saves the new book values based on bookid
function editBookModal(bookid) {
  $.ajax( {
      type: "POST",
      url: "../php/get-book.php",
      data: {bookid:bookid},
      cache: false,
      dataType: 'json',
      success: function(result){
        console.log(result);
        $('.modal-header').html(result.title);
        $('#inpt-mod-book-title').val(result.title);
        $('#inpt-mod-book-author').val(result.author);
        $('#inpt-mod-book-category').val(result.category);
        $('select').material_select();
        $('#inpt-mod-book-pub').val(result.publisher);
        $('#inpt-mod-book-price').val(result.price);
        $('#inpt-mod-book-isbn').val(result.isbn);
        $("#modal-modify-books .preview").css('background-image','url('+result.img+')');
      }
    });
  $('#modal-modify-books').openModal();
  $('#btn-modal-modify-book-save').attr('book-id',bookid);
  $('#btn-modal-modify-book-delete').attr('book-id',bookid);
}



// pop the modal warning
function openWarning(id) {
  $('#modal-warning').openModal();
  var title = $('#'+id+' .book').attr('data-tooltip');
  $('#modal-warning-delete').attr('book-id',id);
  $('#modal-warning h5').text(title);
}




// deletes the book based on bookid
function deleteBook(id) {
  $.ajax( {
    type: "POST",
    url: "../php/delete-book.php",
    data: {bookid:id},
    success: function(result) {
      console.log(result);
      Materialize.toast('Book deleted', 4000);
      $('div#'+id).fadeOut();
    }
  });
}


// empty the modal
function clearModal() {
  $('#inpt-isbn').val('');
  $('#inpt-book-title').val('');
  $('#inpt-book-author').val('');
  
  $('#inpt-book-category').prop('selectedIndex',0);
  $('select').material_select();
  
  $('#inpt-book-pub').val('');
  $('#inpt-book-isbn').val('');
  $('#inpt-book-price').val('');
  $('#inpt-isbn').removeClass('valid');
  $('#inpt-isbn').removeClass('invalid');
  $('#inpt-book-title').removeClass('invalid');
  $('#inpt-book-author').removeClass('invalid');
  $('#inpt-book-pub').removeClass('invalid');
  $('#inpt-book-price').removeClass('invalid');
  $('#inpt-book-isbn').removeClass('invalid');
  $("label[for='inpt-isbn']").removeClass('active');
  $("label[for='inpt-book-title']").removeClass('active');
  $("label[for='inpt-book-author']").removeClass('active');
  $("label[for='inpt-book-pub']").removeClass('active');
  $("label[for='inpt-book-price']").removeClass('active');
  $("label[for='inpt-book-isbn']").removeClass('active');
  $('.books .preview').css('background-image','');
  $('.lbl-isbn-error').hide();
}