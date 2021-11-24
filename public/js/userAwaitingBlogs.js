


$(document).ready(function(){
    // datatable code
    
    var table = $('#awaiting').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      autoWidth: true,
      order: [0,'desc'],
     "ajax": {
       'url' : baseUrl+'/getUserAwaitingBlogs',
       'type': 'get',
     },
    
      columns: [
         
          {data: 'image', name: 'image'},
          {data: 'title', name: 'title'},
          {data: 'user_id', name: 'user_id'},
          {data: 'category_id', name: 'category_id'},
          {data: 'short_description', name: 'short_description'},
          {data: 'description', name: 'description'},
          {data: 'active', name: 'active'},
         {data: 'action', name: 'action', orderable : false, searchable:false},
          {data: 'action1', name: 'action1', orderable : false, searchable:false},
      ],
      "columnDefs" : [
        {
           "width" : "40%" , "targets" : 2
        },
        {
          "width" : "20%" , "targets" : 1
       },
        {
          "render" : function (data,type,row,meta)
          {
            return `<img src="${baseUrl}/images/blogsImages/${row.image}" style="width:70px;height:70px"> `
          },
          
          "targets" : 0
        },
        {
          "render" : function (data,type,row,meta)
          {
            return `<a href="${baseUrl}/userBlogBladeView/${row.id}" class="btn btn-primary btn-sm editCategory" id="${row.id}"><i class='fas fa-pencil-alt'></i>  Edit</a> `
          },
          
          "targets" : 7
        },
    
        {
          "render" : function (data,type,row,meta)
          {
            return `<a href="#" class="btn btn-danger btn-sm userBlogsDelete" id="${row.id}"><i class='far fa-trash-alt'></i>  Delete</a> `
          },
          "targets" : 8
        },
    
    
      ]
      
    });
    
    
    
    
    //   // get category for update
    //   $(document).on('click', '.editCategory', function(e){
    //     e.preventDefault();
    //     var id = $(this).attr('id');
    //     $.ajax({
    //       url : baseUrl+'/getCategory/'+id,
    //       type : 'GET',
    //       processData : false,
    //       contentType : false,
    //       success:function(data){
    //         $('#Category_id').val(data.id);
    //         $('#editCategory_name').val(data.name);
    //         $('#editCategoryModal').modal('show');
    //       },
    //       error : function(data,textStatus,xhr)
    //       { 
    //         Swal.fire({
    //           icon: 'error',
    //           title:'not found',
    //           text: 'sorry data was not found',
    //         })
    
    
    //       },
          
    //     });
    //   });
    
    //   //update category
    
    //   $('#editCategory').submit(function(e){
    //     e.preventDefault();
    //     var form = $('#editCategory')[0];
    //     var formData = new FormData(form);
    //     $.ajax({
    //       url : baseUrl+'/updateCategory',
    //       type: 'POST',
    //       data: formData,
    //       processData:false,
    //       contentType:false,
    //       success:function(data){
    //         onSuccessRemoveEditErrors();
    //         $('#editCategoryModal').modal('hide');
    //         Swal.fire({
    //           icon: 'success',
    //           title:'Success',
    //           text: 'Category was Updated successfully',
    //         })
    //         table.ajax.reload();
    //       },
    //       error : function(reject){
    //         if(reject.status = 422){
    //           refreshEditErrors();
    //           var errors = $.parseJSON(reject.responseText);
    //           $.each(errors.errors , function(key, value){
    //             $('#'+key).addClass('is-invalid');
    //             $('#'+ key + '_help').text(value[0]);
    //           })
    //         }
    //       }
    //     });
    //   });
    
       // delete category
    
      $(document).on('click','.userBlogsDelete',function(e){
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
          url:baseUrl+'/userDeleteBlogs/'+ id,
          type:'GET',
          processData:false,
          contentType:false,
          success : function(data){
            Swal.fire({
              icon: 'success',
              title:'Success',
              text: 'Blog was deleted successfully',
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
    


    //   // update error show
    
    //   function onSuccessRemoveEditErrors(){
    //     $('#editCategory_name').removeClass('is-invalid');
    //     $('#editCategory_name').val('');
    //     $('#edit_category_help').text('');
    //   }
    //   function refreshEditErrors(){
    //     $('#editCategory_name').removeClass('is-invalid');
    //     $('#edit_category_help').text('');
    //   }
      
    //   $('#editCategoryModal').on('hidden.bs.modal',function(){
    //     onSuccessRemoveEditErrors();
    //   })
    
    
    //   // create error show
    //   function onSuccessRemoveErrors(){
    //     $('#category_name').removeClass('is-invalid');
    //     $('#category_name').val('');
    //     $('#category_name_help').text('');
    //   }
    //   function refreshErrors(){
    //     $('#category_name').removeClass('is-invalid');
    //     $('#category_name_help').text('');
    //   }
      
    //   $('#myModal').on('hidden.bs.modal',function(){
    //     onSuccessRemoveErrors();
    //   })
      
      });