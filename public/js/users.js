


$(document).ready(function(){
// datatable code

var table = $('#users').DataTable({
  processing: true,
  serverSide: true,
  responsive: true,
  autoWidth: true,
  order: [0,'asc'],
 "ajax": {
   'url' : baseUrl+'/getAllUsersAdmin',
   'type': 'GET',
 },

  columns: [
     
      {data: 'id', name: 'id'},
      {data: 'name', name: 'name'},
      {data: 'email', name: 'email'},
     {data: 'created_at', name: 'created_at'},
      {data: 'updated_at', name: 'updated_at'},
      {data: 'action', name: 'action', orderable : false, searchable:false},
      
  ],
  "columnDefs" : [
   

    {
      "render" : function (data,type,row,meta)
      {
        return `<a href="#" class="btn btn-danger btn-sm deleteUsers" id="${row.id}"><i class='far fa-trash-alt'></i>  Delete</a> `
      },
      "targets" : 5
    },


  ]
  
});



  
    
  // delete category

  $(document).on('click','.deleteUsers',function(e){
e.preventDefault();
var id = $(this).attr('id');

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, User delete!'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
      url:baseUrl+'/deleteUsersAdmin/'+ id,
      type:'GET',
      processData:false,
      contentType:false,
      success : function(data){
        Swal.fire({
          icon: 'success',
          title:'Success',
          text: 'User was deleted successfully',
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