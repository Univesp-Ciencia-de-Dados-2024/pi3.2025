    
 
         <!-- Begin Page Content -->
         <div class="container-fluid">

         
             <!-- Page Heading -->
             <h1 class="h3 mb-2 text-gray-800">Usuários</h1>
             
             <!-- DataTables Example -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Usuários do Sistema</h6>
                 </div>
                 <div class="card-body">
                     <?php if (isset($message)) echo '<div class="alert alert-info">' . $message . '</div>'; ?>
                        <a href="/sipap/admin/usuarios/new"><input class="btn btn-primary float-left mb-3" type="submit" value="Novo"></a>
                     <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" name="example" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>Nome</th>
                                     <th>Sobrenome</th>
                                     <th>Cpf</th>
                                     <th>RG</th>
                                      
                                     <th>Ações</th>                                    
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php if (isset($record) && is_array($record)) : ?>
                                     <?php foreach ($record as $key => $value) : ?>
                                         <tr>
                                             <th><?= $value->nome ?? '-' ?></th>
                                             <th><?= $value->sobrenome ?? '-' ?></th>
                                             <th><?= $value->cpf ?? '-' ?></th>
                                             <th><?= $value->rg ?? '-' ?></th>
                                             
                                             
                                             <th>
                                                 <a href="/sipap/admin/usuarios/edit/<?= $value->id ?>" class="btn btn-primary">Editar</a>
                                                 <a href="/sipap/admin/usuarios/delete/<?= $value->id ?>" class="btn btn-danger">Deletar</a>
                                                 <a href="/sipap/admin/usuarios/login/<?= $value->id ?>" class="btn btn-danger">Login</a>
                                             </th>
                                         </tr>
                                 <?php endforeach;
                                    endif; ?>
                             </tbody>

                         </table>
                     </div>
                 </div>
             </div>

         </div>
         <!-- /.container-fluid -->
        
       
    