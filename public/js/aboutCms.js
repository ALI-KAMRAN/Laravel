


$(document).ready(function(){
    
    // create tag code
        $('#aboutCms').submit(function(event){
      event.preventDefault();
      var form = $ ('#aboutCms')[0];
      var formData = new FormData(form);
      $.ajax({
        url : baseUrl+'/aboutCmsInsertOrUpdate',
        type : 'POST',
        data : formData,
        contentType : false,
        processData : false,
      
        success: function(data) {
          
          refreshErrors();
          if(data.msg == 'Created'){
            $('#about_section_name').val(data.about.section_name);
          
          Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'About data created successfully!',
        
      })
      }else{

 $('#about_section_name').val(data.about.section_name);
          
          Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'About data updated successfully!',
        
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
        $('#about_heading').removeClass('is-invalid');
        $('#about_heading_help').text('');
        $('#about_description').removeClass('is-invalid');
        $('#about_description_help').text('');
        $('#about_short_description').removeClass('is-invalid');
        $('#about_short_description_help').text('');
      }
      

      
      });