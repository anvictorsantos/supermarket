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
      <div class="container">
        <?php
        echo form_open("produtos/novo");

        echo form_label("Nome", "nome");
        echo form_input(array(
        "name" => "nome",
        "id" => "nome",
        "class" => "form-control",
        "maxlength" => "255"
        ));

        echo form_label("Preco", "preco");
        echo form_input(array(
        "name" => "preco",
        "id" => "preco",
        "class" => "form-control",
        "maxlength" => "255",
        "type" => "number"
        ));

        echo form_textarea(array(
        "name" => "descricao",
        "class" => "form-control",
        "id" => "descricao"
        ));

        echo form_button(array(
        "class" => "btn btn-primary",
        "content" => "Cadastrar",
        "type" => "submit"
        ));

        echo form_close();
        ?>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script href="<?= base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
    </body>
</html>