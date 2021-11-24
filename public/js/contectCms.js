


$(document).ready(function(){
    
    // create tag code
        $('#contectCms').submit(function(event){
      event.preventDefault();
      var form = $ ('#contectCms')[0];
      var formData = new FormData(form);
      $.ajax({
        url : baseUrl+'/contectCmsInsertOrUpdate',
        type : 'POST',
        data : formData,
        contentType : false,
        processData : false,
      
        success: function(data) {
          
          refreshErrors();
          if(data.msg == 'Created'){
            $('#contect_section_name').val(data.contect.section_name);
          
          Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Contect data created successfully!',
        
      })
      }else{

 $('#contect_section_name').val(data.contect.section_name);
          
          Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Contect data updated successfully!',
        
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
        $('#contect_heading').removeClass('is-invalid');
        $('#contect_heading_help').text('');
        $('#contect_description').removeClass('is-invalid');
        $('#contect_description_help').text('');
        $('#contect_short_description').removeClass('is-invalid');
        $('#contect_short_description_help').text('');
      }
      

      
      });