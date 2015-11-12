$(function() {
  
  // search button click focus on input
  $('.main-search i').click(function(){
    $('#inpt-search').focus();
  });
  
  // search input keyup hook
  $("input#inpt-search").keyup(function(e) {
    clearTimeout($.data(this, 'timer'));
    var search_string = $(this).val();
    if (search_string == '') {
      $("ul#results").fadeOut();
      $('h4#results-text').fadeOut();
    } else {
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
  
  
});//end doc ready





// main search function passes string to php and gets results
function search() {
  var query_value = $('#inpt-search').val();
  console.log("search string: "+query_value);
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





// book click opens modal and gets book info from DB
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
        $('#inpt-modal-book-price').val(result.price);
        $('#inpt-modal-book-isbn').val(result.isbn);
        $("#modal-book .preview").css('background-image','url('+result.img+')');
      }
    });
  $('#modal-book').openModal();
}





// get url path for search query from any page
function getPathFromUrl(url) {
  return url.split("=")[1];
}