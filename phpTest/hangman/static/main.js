
/* Submit letter */

$('#letter-form').submit(function(e) {
  var data = $("#letter-form").serialize();
  
  /* Empty input */
  $('#letter-form input').val('');
  
  $.ajax({
    type: "POST",
    url: '',
    data: data,
    success: function(data) {
      /* Refresh if finished */
      if (data.finished) {
        location.reload();
      }
      else {
        /* Update current */
        $('#current').text(data.current);
        
        /* Update errors */
        $('#errors').html(
          'Errors (' + data.errors.length + '/6): ' +
          '<span class="text-danger spaced">' + data.errors + '</span>');
          
        /* Update drawing */
        for (var i = 0; i < data.errors.length; i++)
          $('#hangman-' + i).show();
      }
    }
  });
  e.preventDefault();
});
