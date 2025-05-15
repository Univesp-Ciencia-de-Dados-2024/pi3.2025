<!DOCTYPE html>
<html lang="en">

<head>
<style>
    .dataTables_filter {
   display: none;
}
</style>    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/modelo/public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/modelo/public/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/modelo/public/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

   <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


   <!-- acecssibilidade -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
   <link rel="stylesheet" href="https://camarabatatais.com.br/src/icons/fontawesome5.9.0/css/all.css" />
   <link rel="stylesheet" href="https://camarabatatais.com.br/src/css/default.css" />
   <link rel="stylesheet" href="https://camarabatatais.com.br/src/css/asb.css" />


</head>
<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable();
    $("#pesquisar").keyup(function() {
        table.search( this.value ).draw();
 });

});
</script>
<body id="page-top">

