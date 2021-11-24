


$(document).ready(function(){
// submit contact form
    $('#contactForm').submit(function(event){
  event.preventDefault();
  var form = $ ('#contactForm')[0];
  var formData = new FormData(form);
  $.ajax({
    url : baseUrl+'/message/Contect-form',
    type : 'POST',
    data : formData,
    contentType : false,
    processData : false,
  
    success: function(data) {
     
      onSuccessRemoveErrors();
      Swal.fire({
    icon: 'success',
    title: 'Success',
    text: 'Thanks for contect us! We contect you as soon as possible',
    
  })
  
    },

     error : function(reject){
      if(reject.status = 422){
        refreshErrors();
        var errors = $.parseJSON(reject.responseText);
        $.each(errors.errors , function(key, value){
          $('#'+key).addClass('is-invalid');
          $('#'+ key + '_help').text(value[0]);
        })
      }
    }
     
  });
  });

    });

// create error show
  function onSuccessRemoveErrors(){
    $('#name').removeClass('is-invalid');
    $('#name').val('');
    $('#name_help').text('');
    $('#email').removeClass('is-invalid');
    $('#email').val('');
    $('#email_help').text('');
    $('#phone_num').removeClass('is-invalid');
    $('#phone_num').val('');
    $('#phone_num_help').text('');
    $('#message').removeClass('is-invalid');
    $('#message').val('');
    $('#message_help').text('');
      }
  function refreshErrors(){
    $('#name').removeClass('is-invalid');
    $('#name_help').text('');
     $('#email').removeClass('is-invalid');
    $('#email_help').text('');
     $('#phone_num').removeClass('is-invalid');
    $('#phone_num_help').text('');
     $('#message').removeClass('is-invalid');
    $('#message_help').text('');
  }