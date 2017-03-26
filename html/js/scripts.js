/**
 * scripts.js
 *
 * 
 * Global JavaScript, if any.
 */
 
 $('#upload').on('Click', function() {
  var file_data = $('#image').prop('files')[0];
  var form_data = new FormData();
  form_data.append('file', file_data);
  $.ajax({
   url: 'upload.php',
   dataType: 'text',
   cache: false,
   contentType: false,
   data: form_data,
   type: 'post',
   success: function(php_script_response){
     alert(php_script_response);
    } 
   });
 
 });  
  
