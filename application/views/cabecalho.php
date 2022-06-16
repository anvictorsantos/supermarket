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
    <?php if ($this->session->flashdata("success")) : ?>
        <p class="alert-success"><?= $this->session->flashdata("success") ?></p>
    <?php endif ?>
    <?php if ($this->session->flashdata("danger")) : ?>
        <p class="alert-danger"><?= $this->session->flashdata("danger") ?></p>
    <?php endif ?>