	<!-- Modal -->
<div class="modal fade" id="votoModal" tabindex="-1" role="dialog" aria-labelledby="votoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="votoForm" action="/popular/usuarios/votacao" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="votoModalLabel">Confirmar Voto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="materia_id" id="materiaId">
	  <input type="hidden" name="id_inscricao" id="id_inscricao" value ="<?php echo($id_inscricao); ?>" />
          <div class="form-group">
            <p id="ementaTexto">Apresentar a ementa aqui</p>
          </div>
          <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
            <label class="btn btn-success" id="btnAprovar">
              <input type="radio" name="voto" value="aprovar" autocomplete="off"> Favorável
            </label>
            <label class="btn btn-danger" id="btnRejeitar">
              <input type="radio" name="voto" value="rejeitar" autocomplete="off"> Contrário
            </label>
          </div>
          <div class="form-group">
            <label for="justificativa">Justificativa:</label>
            <textarea class="form-control" id="justificativa" name="justificativa" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enviar Voto</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Dentro do loop de matérias -->
<!-- DataTales Example -->
<div class="card shadow mb-4 col-md-12">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Matérias da Próxima Sessão</h6>
                        </div>
                        <div class="card-body">
				<?php if (isset($message)) echo '<div class="alert alert-info">' . $message . '</div>'; ?>


<div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" name="example" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>Ementa</th>
                                     <th>Acoes</th>                                    
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php if (isset($record) && is_array($record)) : ?>
                                     <?php foreach ($record as $key => $value) : ?>
                                         <tr>
                                             <th style='width: 75%;'><?= $value->ementa ?? '-' ?></th>
                                             
                                             <th>
                                                <button type="button" class="btn btn-primary btn-votar" 
        data-id="<?= $value->id_materia ?>" 
        data-ementa="<?= htmlspecialchars($value->ementa ?? '-', ENT_QUOTES, 'UTF-8') ?>" 
        data-toggle="modal" data-target="#votoModal">Votar</button>

                                        	<a href="/sipap/admin/usuarios/delete/" class="btn btn-danger">Resultado</a>
                                             </th>
                                         </tr>
                                 <?php endforeach;
                                    endif; ?>
                             </tbody>

                         </table>
                     </div>



                           



<!-- Script para lidar com botões e modal -->
<script>

function cortarAposCaractere(str, caractere) {
  const indice = str.indexOf(caractere);
  if (indice === -1) {
    return str; // caractere n�o encontrado, retorna a string inteira
  }
  return str.substring(0, indice); // retorna a parte antes do caractere
}

  document.addEventListener('DOMContentLoaded', function () {
    const votarButtons = document.querySelectorAll('.btn-votar');
    const materiaIdInput = document.getElementById('materiaId');

    votarButtons.forEach(button => {
      button.addEventListener('click', function () {
        const materiaId = this.getAttribute('data-id');
        const ementa = this.getAttribute('data-ementa');
	//ementa = cortarAposCaractere(ementa);

        materiaIdInput.value = materiaId;
        document.getElementById('ementaTexto').textContent = ementa;

        // Reset buttons and textarea
        document.querySelectorAll('#votoModal .btn').forEach(btn => btn.classList.remove('active'));
        document.getElementById('justificativa').value = '';
      });
    });
  });
</script>
