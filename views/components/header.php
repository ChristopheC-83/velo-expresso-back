<header class="p-3  text-center bg-dark ">
    <a href="<?= URL ?>" class="text-decoration-none">
        <h1 class="container text-light text-center fw-bold d-inline">Les données du site </h1>
    </a>
    <?php if (!empty($_SESSION['user_name'])) : ?>
        <a href="<?= URL ?>/logout" class="btn btn-black text-white align-middle mb-1 ms-auto">Logout <?= $_SESSION['user_name']  ?></a>
    <?php endif ?>
</header>

<?php if (!empty($_SESSION['user_name'])) : ?>
    <div class="min-vw-100 p-1 bg-info">
        <div class="container d-flex justify-content-between flex-column flex-sm-row">
            <div class="d-flex flex-column justify-content-between  m-0 ">
                <h3 class="w-100 text-black text-center m-0">Accueil</h3>
                <div class=" w-100 d-flex flex-wrap justify-content-center">
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>" class="text-light text-decoration-none">Slider</a>
                    </button>
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>" class="text-light text-decoration-none">Cadres</a>
                    </button>
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>" class="text-light text-decoration-none">Partenaires</a>
                    </button>
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>" class="text-light text-decoration-none">Avis</a>
                    </button>
                </div>
            </div>
            <div class="m-0 ">
                <h3 class="w-100 text-black text-center m-0">Location</h3>
                <div class="container d-flex justify-content-center">
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>hangman/words_list" class="text-light text-decoration-none">Location</a>
                    </button>

                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-between flex-column flex-sm-row">
            <div class="m-0 ">
                <h3 class="w-100 text-black text-center m-0">Atelier</h3>
                <div class="container d-flex justify-content-center">
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>hangman/words_list" class="text-light text-decoration-none">Cat / Presta</a>
                    </button>

                </div>
            </div>
            <div class="m-0">
                <h3 class="w-100 text-black text-center m-0">Vélos</h3>
                <div class="container d-flex justify-content-center">
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>" class="text-light text-decoration-none">Caractéristiques</a>
                    </button>
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>" class="text-light text-decoration-none">Vélos</a>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div class="my-2 w-100 h-100 p-1 p-sm-2 p-md-3">
        <h2 class="text-center mb-2"><u>Notice :</u></h2>
        <h3><u>Accueil:</u></h3>
        <h3><u>Location:</u></h3>
        <h3><u>Atelier:</u></h3>
        <h3><u>Vélos:</u></h3>



    </div>

<?php endif ?>