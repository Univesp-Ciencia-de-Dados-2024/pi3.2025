

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
                                         	<button 
                                        type="button" 
                                        class="btn btn-info btn-resultado"
                                        data-id="<?= $value->id_materia ?>"
                                        data-ementa="<?= htmlspecialchars($value->ementa ?? '-', ENT_QUOTES, 'UTF-8') ?>"
                                        data-favoravel="20" 
                                        data-contrario="30" 
                                        data-toggle="modal" 
                                        data-target="#votoModal"
                                    >
                                        Resultado
                                    </button>    

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

<!-- Chart.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- Script para lidar com o gráfico -->
<script>
  let votoChart; // variável global para manter controle

  document.addEventListener('DOMContentLoaded', function () {
    const resultadoButtons = document.querySelectorAll('.btn-resultado');

    resultadoButtons.forEach(button => {
      button.addEventListener('click', function () {
        const ementa = this.getAttribute('data-ementa');
        const favoravel = parseInt(this.getAttribute('data-favoravel'));
        const contrario = parseInt(this.getAttribute('data-contrario'));

        // Salva os dados em variáveis globais para uso no evento do modal
        window.chartData = {
          ementa,
          favoravel,
          contrario
        };
      });
    });

    // Espera o modal abrir para renderizar o gráfico
    $('#votoModal').on('shown.bs.modal', function () {
      const { ementa, favoravel, contrario } = window.chartData;

      document.getElementById('ementaTexto').textContent = ementa;

      const ctx = document.getElementById('graficoVotos').getContext('2d');

      // Destroi gráfico anterior, se houver
      //if (votoChart) {
      //  votoChart.destroy();
     // }

      votoChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Favoráveis', 'Contrários'],
          datasets: [{
            label: 'Quantidade de Votos',
            data: [favoravel, contrario],
            backgroundColor: ['#28a745', '#dc3545']
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: true,
              position: 'bottom'
            }
          },
          scales: {
            y: {
              min: 0, // força o eixo Y a começar em 0
              ticks: {
                beginAtZero: true
              },
              title: {
                display: true,
                text: 'Quantidade de Votos'
              }
            }
          }
        }
      });
    });
  });
</script>

<!-- Modal com gráfico de barras -->
<div class="modal fade" id="votoModal" tabindex="-1" role="dialog" aria-labelledby="votoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="votoModalLabel">Resultado da Votação</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <p id="ementaTexto">Apresentar a ementa aqui</p>
              <canvas id="graficoVotos" width="400" height="300"></canvas>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
      </div>
  </div>
</div>
