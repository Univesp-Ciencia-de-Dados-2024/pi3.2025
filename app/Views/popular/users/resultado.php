<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Bootstrap 4 JS and dependencies (opcional se não estiver mais usando componentes do Bootstrap como modais) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Dentro do loop de matÃ©rias -->
<!-- DataTales Example -->
	<div class="card shadow mb-4 col-md-12">
        	<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Resultado da Votação</h6>
                </div>
            	<div class="card-body">
			<div><p>Total de Votos: <?php echo($soma_favoravel+$soma_contrario); ?> </p></div>
			<div class="col-md-3" style="max-width:400;max-height:300">
				<!-- Gráfico diretamente na página -->
				<canvas id="graficoVotos" max-width="400" height="300"></canvas>
			</div>
			<div><p><?= $ementa ?? 'Erro ao buscar descrição' ?></div>
			

			</div>
		</div>
	</div>






<!-- Script para renderizar o gráfico ao carregar a página -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('graficoVotos').getContext('2d');

    const votoChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Favorável', 'Contrário'],
        datasets: [{
          label: 'Resultado da Votacao',
          data: [<?= $soma_favoravel ?? '0' ?>, <?= $soma_contrario ?? '0' ?>],
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
            min: 0,
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
</script>
