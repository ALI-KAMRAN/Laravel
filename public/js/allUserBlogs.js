$(document).ready(function(){
    // datatable code
    
    var table = $('#allUserBlogs').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      autoWidth: true,
      order: [0,'desc'],
     "ajax": {
       'url' : baseUrl+'/getAllUserBlogs',
       'type': 'get',
       'data': {
      '_token' : $("meta[name='csrf-token']").attr('content')
       },
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
            return `<a href="" class="btn btn-primary btn-sm editBlogs"  id="${row.id}"><i class='fas fa-pencil-alt'></i>  Edit</a> `
          },
          
          "targets" : 7
        },
    
        {
          "render" : function (data,type,row,meta)
          {
            return `<a href="#" class="btn btn-danger btn-sm deleteBlogs" id="${row.id}"><i class='far fa-trash-alt'></i>  Delete</a> `
          },
          "targets" : 8
        },
    
    
      ]
      
    });



 // get Bolg for update
      $(document).on('click', '.editBlogs', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
          url : baseUrl+'/getBlog/'+id,
          type : 'GET',
          processData : false,
          contentType : false,
          success:function(data){
            $('#Blog_id').val(data.id);
            $('#edit_blog_name').val(data.name);
            $('#editBlogModal').modal('show');
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











    });
