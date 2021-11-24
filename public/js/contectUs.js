


$(document).ready(function(){
// datatable code

 var table = $('#messages').DataTable({
   processing: true,
   serverSide: true,
   responsive: true,
   autoWidth: true,
   order: [0,'desc'],
  "ajax": {
    'url' : baseUrl+'/getAllMessage',
    'type': 'GET',
  },

   columns: [
     
       {data: 'id', name: 'id'},
       {data: 'name', name: 'name'},
       {data: 'email', name: 'email'},
       {data: 'phone_num', name: 'phone_num'},
       {data: 'message', name: 'message'},
       {data: 'created_at', name: 'created_at'},
       {data: 'action', name: 'action', orderable : false, searchable:false},
      {data: 'action', name: 'action', orderable : false, searchable:false},
       
   ],
   "columnDefs" : [
     
     {
           "width" : "5%" , "targets" : 2
        },
     {
       "render" : function (data,type,row,meta)
       {
         return `<a href="#" class="btn btn-primary btn-sm viewMessage" id="${row.id}"><i class='far fa-eye'></i>  View</a> `
       },
       "targets" : 6
     },

     {
       "render" : function (data,type,row,meta)
       {
         return `<a href="#" class="btn btn-danger btn-sm deleteMsg" id="${row.id}"><i class='far fa-trash-alt'></i>  Delete</a> `
       },
       "targets" : 7
     },


   ]
  
 });



  

// view contact message in detail
  $(document).on('click', '.viewMessage', function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    $.ajax({
      url : baseUrl+'/viewContactMessageDetail/'+id,
      type : 'GET',
      processData : false,
      contentType : false,
      success:function(data){
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#phone_num').val(data.phone_num);
        $('#message').val(data.message);
        $('#messageDetail').modal('show');
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
  

  

  // delete contact message

  $(document).on('click','.deleteMsg',function(e){
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
      url:baseUrl+'/deleteMsg/'+ id,
      type:'GET',
      processData:false,
      contentType:false,
      success : function(data){
        Swal.fire({
          icon: 'success',
          title:'Success',
          text: 'Message was deleted successfully',
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

   });


  
  
  
 