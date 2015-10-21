$(function() {
  
  
  
  // Icon Click Focus
  $('.main-search i').click(function(){
    $('#inpt-search').focus();
  });


  // On Search Submit and Get Results
  function search() {
    var query_value = $('#inpt-search').val();
    if(query_value !== ''){
      $.ajax({
        type: "POST",
        url: "../php/search-book.php",
        data: { query: query_value },
        cache: false,
        success: function(html){
          $("ul#results").html(html);
        }
      });
    }return false;    
  }

  $("input#inpt-search").keyup(function(e) {
    // Set Timeout
    clearTimeout($.data(this, 'timer'));
    // Set Search String
    var search_string = $(this).val();
    // Do Search
    if (search_string == '') {
      $("ul#results").fadeOut();
      $('h4#results-text').fadeOut();
    }else{
      $("ul#results").fadeIn();
      $('h4#results-text').fadeIn();
      $(this).data('timer', setTimeout(search, 100));
    };
  });
  
  //load query from url and search
  var url = $(location).attr('href');
  url = getPathFromUrl(url);
  $('#inpt-search').val(url);
  search();
  //if not blank...
  
  
});//end doc ready






function getPathFromUrl(url) {
  return url.split("=")[1];
}

function openBookModal(bookid) {
  $.ajax( {
      type: "POST",
      url: "../php/get-book.php",
      data: {bookid:bookid},
      cache: false,
      dataType: 'json',
      success: function(result){
        console.log(result);
        $('.modal-header').html(result.title);
        $('#inpt-modal-book-title').val(result.title);
        $('#inpt-modal-book-author').val(result.author);
        $('#inpt-modal-book-pub').val(result.publisher);
        $('#inpt-modal-book-isbn').val(result.isbn);
        $("#modal-book .preview").css('background-image','url('+result.img+')');
      }
    });
  $('#modal-book').openModal();
//  $('#btn-modal-modify-book-save').attr('book-id',bookid);
//  $('#btn-modal-modify-book-delete').attr('book-id',bookid);
}