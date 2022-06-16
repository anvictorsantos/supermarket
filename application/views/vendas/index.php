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
    <h1>Produtos vendidos</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtosVendidos as $produto) : ?>
                <tr>
                    <td>
                        <?= $produto["nome"] ?>
                    </td>
                    <td>
                        <?= dataMySqlParaPtBr($produto["data_de_entrega"]) ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script href="<?= base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
</body>

</html>