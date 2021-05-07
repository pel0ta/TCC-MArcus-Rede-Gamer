provavelmente vou usar isso no modal
<form class="form-row " enctype="multipart/form-data" action="operacoes/alteradescricaopublicacao.php" method="POST">
    <input type="hidden" id="idpublicacao" name="idpublicacao" value="<?php echo$idpublicacao?>" />
    <div class="col-12">
      	<textarea class="form-control" style="line-height: 20px;padding: 10px;height: 100px;resize: none;"id="textopublicacao"name="textopublicacao" rows="3"required autofocus><?php echo $idpublicacao ?>soh um texte mesmo</textarea>
    </div>
	<div class="modal-footer">
		<button type="reset"  data-dismiss="modal" class=" btn btn-danger  mb-3 mr-3">Cancelar</button>
		<button type="submit" class="btn btn-success  mb-3">Alterar</button>
</form>
 	</div>





</html>
<script type="text/javascript">
	$('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var recipient = button.data('whatever') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('New message to ' + recipient)
		modal.find('.modal-body input').val(recipient)
	})
</script>