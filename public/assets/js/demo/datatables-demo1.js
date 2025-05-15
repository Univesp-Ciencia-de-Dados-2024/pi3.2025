// Call the dataTables jQuery plugin
$(document).ready(function() {
     

    $('#dataTable').DataTable(
    {
      "searching": true,
      pageLength: 10,  
      language: {
        url:"/modelo/public/assets/pt_br.json"
      },
      
      }  
    
  );
  var table = $('#dataTable').DataTable();
  $('#pesquisar').keyup(function() {
    table.search( this.value ).draw();
  } );
});
