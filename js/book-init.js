$(function() {
  
  // open new book modal
  $("#btn-book-add").click(function(event){ 
    $('#modal-add-books').openModal();
  });
  
  // new book form, find book details with ISBN
  $("#btn-get-book").click(function() {
    var isbn = $("#inpt-isbn").val();
    isbn2 = isbn.replace('-', '');
    console.log(isbn2);
    $.ajax( {
      type: "POST",
      url: "../php/find-book.php",
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
          var coverUrl = result.img;
          $("label[for='inpt-book-title']").addClass('active');
          $("#inpt-book-title").val(title);
          $("label[for='inpt-book-author']").addClass('active');
          $("#inpt-book-author").val(author);
          $("label[for='inpt-book-pub']").addClass('active');
          $("#inpt-book-pub").val(publisher);
          $("label[for='inpt-book-isbn']").addClass('active');
          $("#inpt-book-isbn").val(isbn2);
          $(".books .preview").css('background-image','url('+coverUrl+')');
        }
      }
    });
  });
  // search 'enter' key press
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
    var pub = $('#inpt-book-pub').val();
    var isbn = $('#inpt-book-isbn').val();
    var owner = $('#inpt-book-owner').val();
    var img = $(".books .preview").css('background-image');
    img = img.replace('url(','').replace(')','');
    console.log(img);
    if (!title || !author || !pub || !isbn) {
      if (!title) {$('#inpt-book-title').addClass('invalid');} 
      else {$('#inpt-book-title').removeClass('invalid');}
      if (!author) {$('#inpt-book-author').addClass('invalid');} 
      else {$('#inpt-book-author').removeClass('invalid');}
      if (!pub) {$('#inpt-book-pub').addClass('invalid');} 
      else {$('#inpt-book-pub').removeClass('invalid');}
      if (!isbn) {$('#inpt-book-isbn').addClass('invalid');} 
      else {$('#inpt-book-isbn').removeClass('invalid');}
    } else {
      $.ajax( {
        type: "POST",
        url: "../php/insert-book.php",
        data: {title:title,author:author,pub:pub,isbn:isbn,owner:owner,img:img},
        success: function(result) {
          console.log(result);
          $('#modal-add-books').closeModal();
          Materialize.toast('Book added', 4000);
          setTimeout(function () {
            location.reload();
          }, 1000);
        }
      });
    }
  });

  
  
  // save book changes
  $("#btn-modal-modify-book-save").click(function() {
    var id = this.getAttribute('book-id');
    var title = $('#inpt-mod-book-title').val();
    var author = $('#inpt-mod-book-author').val();
    var pub = $('#inpt-mod-book-pub').val();
    var isbn = $('#inpt-mod-book-isbn').val();
    $.ajax( {
      type: "POST",
      url: "../php/update-book.php",
      data: {bookid:id,title:title,author:author,pub:pub,isbn:isbn},
      success: function(result) {
        console.log(result);
        $('#modal-modify-books').closeModal();
        Materialize.toast('Book updated', 4000);
      }
    });
  });
  
  
  
  // delete book
  $(".closer, #btn-modal-modify-book-delete").click(function() {
//    $("#warning-modal").openModal({
//      complete: function() { alert('Closed'); }
//    });
    var id = this.getAttribute('book-id');
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
  });
  

  
  

  
  
  
});//end doc ready














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
        $('#inpt-mod-book-pub').val(result.publisher);
        $('#inpt-mod-book-isbn').val(result.isbn);
        $("#modal-modify-books .preview").css('background-image','url('+result.img+')');
      }
    });
  $('#modal-modify-books').openModal();
  $('#btn-modal-modify-book-save').attr('book-id',bookid);
  $('#btn-modal-modify-book-delete').attr('book-id',bookid);
}