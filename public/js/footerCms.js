


$(document).ready(function(){
    
    // create tag code
        $('#footerCms').submit(function(event){
      event.preventDefault();
      var form = $ ('#footerCms')[0];
      var formData = new FormData(form);
      $.ajax({
        url : baseUrl+'/footerCmsInsertOrUpdate',
        type : 'POST',
        data : formData,
        contentType : false,
        processData : false,
      
        success: function(data) {
          
          refreshErrors();
          if(data.msg == 'Created'){
            $('#footer_section_name').val(data.footer.section_name);
          
          Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Footer data created successfully!',
        
      })
      }else{

 $('#footer_section_name').val(data.footer.section_name);
          
          Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Footer data updated successfully!',
        
      })

      }
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
    
    
       function refreshErrors(){
        $('#twitter').removeClass('is-invalid');
        $('#twitter_help').text('');
        $('#facebook').removeClass('is-invalid');
        $('#facebook_help').text('');
        $('#instagram').removeClass('is-invalid');
        $('#instagram_help').text('');
      }
      

      
      });