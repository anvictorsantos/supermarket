<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css"); ?>">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Produtos</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
    			<th scope="col">Preço</th>
    		</tr>
    	</thead>
    	<tbody>
            <?php foreach ($produtos as $produto) : ?>
            <tr>
                <td><?= $produto["nome"] ?></td>
                <td><?= numeroEmReais($produto["preco"]) ?></td>
            </tr>  
            <?php endforeach ?>
    	</tbody>
    </table>

  <?php if ($this->session->userdata("usuario_logado")) : ?>
    <?= anchor('login/logout', 'Logout', array("class" => "btn btn-primary")) ?>
  <?php else : ?>
  <h1>Login</h1>
  <?php
  echo form_open("login/autenticar");

  echo form_label("Email", "email");
  echo form_input(array(
    "name" => "email",
    "id" => "email",
    "class" => "form-control",
    "maxlength" => "255"
  ));

  echo form_label("Senha", "senha");
  echo form_password(array(
    "name" => "senha",
    "id" => "senha",
    "class" => "form-control",
    "maxlength" => "255"
  ));

  echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Login",
    "type" => "submit"
  ));

  echo form_close();
  ?>

  <h1>Cadastro</h1>
  <?php
  echo form_open("usuarios/novo");

  echo form_label("Nome", "nome");
  echo form_input(array(
    "name" => "nome",
    "id" => "nome",
    "class" => "form-control",
    "maxlength" => "255"
  ));

  echo form_label("Email", "email");
  echo form_input(array(
    "name" => "email",
    "id" => "email",
    "class" => "form-control",
    "maxlength" => "255"
  ));

  echo form_label("Senha", "senha");
  echo form_password(array(
    "name" => "senha",
    "id" => "senha",
    "class" => "form-control",
    "maxlength" => "255"
  ));

  echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Cadastrar",
    "type" => "submit"
  ));

  echo form_close();
  ?>
  <?php endif ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script href="<?= base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
  </body>
</html>