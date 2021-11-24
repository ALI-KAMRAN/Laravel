


$(document).ready(function(){
    // datatable code
    
    var table = $('#tags').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      autoWidth: true,
      order: [0,'asc'],
     "ajax": {
       'url' : baseUrl+'/getAllTag',
       'type': 'GET',
     },
    
      columns: [
         
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
         {data: 'created_at', name: 'created_at'},
          {data: 'updated_at', name: 'updated_at'},
          {data: 'action', name: 'action', orderable : false, searchable:false},
          {data: 'action1', name: 'action1', orderable : false, searchable:false},
      ],
      "columnDefs" : [
        {
          "render" : function (data,type,row,meta)
          {
            return `<a href="#" class="btn btn-primary btn-sm editTags" id="${row.id}"><i class='fas fa-pencil-alt'></i>  Edit</a> `
          },
          "targets" : 4
        },
    
        {
          "render" : function (data,type,row,meta)
          {
            return `<a href="#" class="btn btn-danger btn-sm deleteTags" id="${row.id}"><i class='far fa-trash-alt'></i>  Delete</a> `
          },
          "targets" : 5
        },
    
    
      ]
      
    });
    
    
    
      // create tag code
        $('#addTag').submit(function(event){
      event.preventDefault();
      var form = $ ('#addTag')[0];
      var formData = new FormData(form);
      $.ajax({
        url : baseUrl+'/addTag',
        type : 'POST',
        data : formData,
        contentType : false,
        processData : false,
      
        success: function(data) {
          $('#tagModal').modal('hide');
          onSuccessRemoveErrors();
          Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Category was submitted!',
        
      })
      table.ajax.reload();
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
    
    
      // get tag for update
      $(document).on('click', '.editTags', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
          url : baseUrl+'/getTag/'+id,
          type : 'GET',
          processData : false,
          contentType : false,
          success:function(data){
            $('#Tag_id').val(data.id);
            $('#edit_tag_name').val(data.name);
            $('#editTagModal').modal('show');
          },
          error : function(data,textStatus,xhr)
          { 
            Swal.fire({
              icon: 'error',
              title:'not found',
              text: 'sorry data was not found',
            })
    
    
          },
          
        });
      });
    
      //update tag
    
      $('#editTag').submit(function(e){
        e.preventDefault();
        var form = $('#editTag')[0];
        var formData = new FormData(form);
        $.ajax({
          url : baseUrl+'/updateTag',
          type: 'POST',
          data: formData,
          processData:false,
          contentType:false,
          success:function(data){
            onSuccessRemoveEditErrors();
            $('#editTagModal').modal('hide');
            Swal.fire({
              icon: 'success',
              title:'Success',
              text: 'Tag was Updated successfully',
            })
            table.ajax.reload();
          },
          error : function(reject){
            if(reject.status = 422){
              refreshEditErrors();
              var errors = $.parseJSON(reject.responseText);
              $.each(errors.errors , function(key, value){
                $('#'+key).addClass('is-invalid');
                $('#'+ key + '_help').text(value[0]);
              })
            }
          }
        });
      });
    
      // delete tag
    
      $(document).on('click','.deleteTags',function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url:baseUrl+'/deleteTag/'+ id,
          type:'GET',
          processData:false,
          contentType:false,
          success : function(data){
            Swal.fire({
              icon: 'success',
              title:'Success',
              text: 'Tag was deleted successfully',
            })
            table.ajax.reload();
          },
          error : function(data,textStatus,xhr)
          { 
            Swal.fire({
              icon: 'error',
              title:'not found',
              text: 'sorry data was not found',
            })
        
        
          },
        })
      }
    })
    
    
    
      });
    
      // update error show
    
      function onSuccessRemoveEditErrors(){CDATASection.
        $('#edit_tag_name').removeClass('is-invalid');
        $('#edit_tag_name').val('');
        $('#edit_tag_name_help').text('');
      }
      function refreshEditErrors(){
        $('#edit_tag_name').removeClass('is-invalid');
        $('#edit_tag_name_help').text('');
      }
      
      $('#editTagModal').on('hidden.bs.modal',function(){
        onSuccessRemoveEditErrors();
      })
    
    
      // create error show
      function onSuccessRemoveErrors(){
        $('#tag_name').removeClass('is-invalid');
        $('#tag_name').val('');
        $('#tag_name_help').text('');
      }
      function refreshErrors(){
        $('#tag_name').removeClass('is-invalid');
        $('#tag_name_help').text('');
      }
      
      $('#tagModal').on('hidden.bs.modal',function(){
        onSuccessRemoveErrors();
      })
      
      });