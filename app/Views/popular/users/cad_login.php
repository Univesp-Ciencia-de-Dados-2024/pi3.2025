 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800"><?= $title = ucfirst($action ?? '') ?> record</h1>
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= $title ?? '' ?> Novo registro Login</h6>
         </div>
         <form action="/modelo/admin/login/<?= $action . '/' . $id ?? 'new' ?>" method="POST">
             <div class="card-body">
                 <?php if (isset($message)) echo '<div class="alert alert-info">' . $message . '</div>'; ?>
                 <?php if ($action == 'delete') : ?>
                     <input class="btn btn-danger float-right mb-3" value="delete" type="submit">
                 <?php else : ?>
                     <input class="btn btn-primary float-right mb-3" type="submit" value="Salvar">
                 <?php endif; ?>
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>Nomes</th>
                                 <th>Sobrenome</th>
                                 <th>CPF</th>
                                 <th>Data de Contrato</th>
                                 <th>Ativo</th>
                                 <th>Departamento</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <th><?= form_input('nome', $edit->nome ?? '', 'class="form-control" ' . $action == "delete" ? 'disabled' : '') ?></th>
                                 <th><?= form_input('sobrenome', $edit->sobrenome ?? '', 'class="form-control" ' . $action == "delete" ? 'disabled' : '') ?></th>
                                 <th><?= form_input('cpf', $edit->cpf ?? '', 'class="form-control" ' . $action == "delete" ? 'disabled' : '') ?></th>
                                 <th><?= form_input('dt_contratacao', $edit->dt_contratacao ?? '', 'class="form-control" ' . $action == "delete" ? 'disabled' : '', 'date') ?></th>
                                 <th><?= form_input('ativo', $edit->ativo ?? '', 'class="form-control" ' . $action == "delete" ? 'disabled' : '', 'number') ?></th>
                                 <th><?= form_input('departamento', $edit->salary ?? '', 'class="form-control" ' . $action == "delete" ? 'disabled' : '', 'number') ?></th>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </form>
     </div>

 </div>
 <!-- /.container-fluid -->