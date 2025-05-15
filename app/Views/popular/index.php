

        <!-- Begin Page Content -->
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Painel de Votação</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="card shadow mb-4 col-md-12">
                    <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Votação em aberto</h6>
                    </div>
                    <div class="card-body">
                            <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <p>A Pauta da <?php echo $titulo ?> do dia <?php $timestamp = strtotime($data);  echo date('d/m/Y', $timestamp); ?> está aberta. Participe... a sua opinião é importante para nós!
                            <a href="/popular/usuarios" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-enquete fa-sm text-white-50"></i> Quero Participar! </a>
                        </div>
                            <!-- <p>No momento nenhuma matéria está aberta para votação. Aguarde o fechamento da pauta da próxima sessão. -->
                    </div>
                </div>    
                    <!-- Approach -->
                    
                    <!-- DataTales Example -->
                    <!-- Dentro do loop de matérias -->
<!-- DataTales Example -->
<div class="card shadow mb-4 col-md-12">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Minhas Participaçoes</h6>
                        </div>
                        <div class="card-body">
				<?php if (isset($message)) echo '<div class="alert alert-info">' . $message . '</div>'; ?>


<div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" name="example" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>Ementa</th>
				     <th>Seu voto</th>
                                     <th>Acoes</th>                                    
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php if (isset($record) && is_array($record)) : ?>
                                     <?php foreach ($record as $key => $value) : ?>
                                         <tr>
                                             <th style='width: 75%;'><?= $value->ementa ?? '-' ?></th>
                                             <th><?php if($value->voto == 1){echo('Favorável');}else{echo('Contrário');}; ?></th>
                                             <th>
                                         	<a href="../popular/usuarios/resultado/<?= $value->id_materia ?>" class="btn btn-danger">Resultado</a>
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
</div>
