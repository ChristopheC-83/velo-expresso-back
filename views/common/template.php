<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:100,400,700,900" rel="stylesheet" />
    <title><?=$page_title?></title>
</head>

<body class="d-flex flex-column min-vh-100 roboto-font bg-light">
    <div class="content flex-grow-1 d-flex flex-column overflow-x-hidden">

        <?php require_once("./views/components/header.php")  ?>

        <!-- pour afficher les messagess -->
        <?php if (!empty($_SESSION['alert'])) : ?>
            <div class="container mt-3 alert <?= $_SESSION['alert']['type'] ?>" role="alert">
                <?= $_SESSION['alert']['message'] ?>
            </div>

        <?php
            unset($_SESSION['alert']);
        endif;
        ?>

        <!-- affiche le contenu spécifique de la page sélectionnée -->
        <div class="flex-grow-1"><?= $page_content ?></div>


        <?php require_once("./views/components/footer.php"); ?>

        <script src="<?=URL?>public/javascript/app.js"></script>
        <?php if (!empty($javascript)) : ?>
            <?php foreach ($javascript as $fichier_js) : ?>
                <script src="<?= URL ?>public/javascript/<?= $fichier_js ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>

</body>

</html>