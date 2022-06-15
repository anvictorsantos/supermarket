<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1><?= html_escape($produto["nome"]) ?></h1>
        Preço: <?= $produto["preco"] ?><br>
        <?= auto_typography(html_escape($produto["descricao"])) ?><br>
    </div>
</body>

</html>