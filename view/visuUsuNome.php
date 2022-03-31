<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");
?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <link rel="icon" type="imagem/png" href="img/icon2.png" /> <!--ICON DA PGN-->

<div class="container mt-5">
  <form action="#" method="Post" class="row row-cols-auto   justify-content-lg-center g-3 align-items-center">
    <div class="col-8">
      <label class="visually-hidden" for="inlineFormInputGroupUsername">Digite o Nome do Usuário</label>
      <div class="input-group">
        <div class="input-group-text">Nome</div>
        <input type="text" name="nomeUsu" class="form-control" id="inlineFormInputGroupUsername"placeholder="Nome do Usuário">
      </div>
    </div>

    <div class="limites">
      <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>
  </form>
  <br>
  <br>
  <br>
  <br>
  <table class="limiter">
    <thead>
        <tr class="table100-head">
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Fone</th>
        <th scope="col">Alterar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $nomeusu = isset($_POST["nomeUsu"])? $_POST["nomeUsu"] : "";

      $dado = visuUsuarioNome($conn,$nomeusu);

      foreach($dado as $nomeUsuarios):
        ?>
        <tr>
          <th scope="row"><?=$nomeUsuarios["idusu"];?></th>
          <td><?=$nomeUsuarios["nomeusu"]?></td>
          <td><?=$nomeUsuarios["emailusu"]?></td>
          <td><?=$nomeUsuarios["foneusu"]?></td>
          <td>
            <form action="../view/alterarform.php" method="POST">
              <input type="hidden" value="<?=$nomeUsuarios["idusu"]?>" name="idusu">
              <button type="submit" class="btn btn-primary">Alterar</button>
            </form>

          </td>
          <td> <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" codigo="<?=$nomeUsuarios["idusu"]?>" nome="<?=$nomeUsuarios["nomeusu"]?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
              Apagar
            </button>
          </td>
        </tr>
        <?php
      endforeach;
      ?>

    </tbody>
  </table>

</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal">Exclusão de Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <form action="../controler/deletarUsuario.php" method="Get">
          <input type="hidden" class="codigo form-control" name="idusu">
          <button type="submit" class="btn btn-danger">Sim</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>

      </div>
    </div>
  </div>
</div>

<script>
var deletarUsuarioModal = document.getElementById('deleteModal');
deletarUsuarioModal.addEventListener('show.bs.modal',function(event){
  var button = event.relatedTarget;
  var codigo = button.getAttribute('codigo');
  var email = button.getAttribute('email');
  var modalBody = deletarUsuarioModal.querySelector('.modal-body');
  modalBody.textContent = 'Gostaria de excluir o Usuario ' + email + '?'

  var Codigo = deletarUsuarioModal.querySelector('.modal-footer .codigo');
  Codigo.value = codigo;
})

</script>

<?php
include_once("../view/footer.php");
?>
