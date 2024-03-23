<header class="p-3  text-center bg-dark ">
    <a href="<?= URL ?>" class="text-decoration-none">
        <h1 class="container text-light text-center fw-bold d-inline">Les données du site </h1>
    </a>
    <?php if (!empty($_SESSION['user_name'])) : ?>
        <a href="<?= URL ?>admin/logout" class="btn btn-black text-white align-middle mb-1 ms-auto">Logout <?= $_SESSION['user_name']  ?></a>
    <?php endif ?>
</header>

<?php if (!empty($_SESSION['user_name'])) : ?>
    <div class="min-vw-100 p-2 p-sm-3 bg-info">
        <div class="container d-flex justify-content-between flex-column flex-sm-row">
            <div class="d-flex flex-column justify-content-between  m-0 ">
                <h3 class="w-100 text-black text-center m-0">Accueil</h3>
                <div class=" w-100 d-flex flex-wrap justify-content-center">
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>admin/sliders_page" class="text-light text-decoration-none">Sliders</a>
                    </button>
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>admin/frames_page" class="text-light text-decoration-none">Cadres</a>
                    </button>
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>admin/partners_page" class="text-light text-decoration-none">Partenaires</a>
                    </button>
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>admin/opinions_page" class="text-light text-decoration-none">Avis</a>
                    </button>
                </div>
            </div>
            <div class="m-0 ">
                <h3 class="w-100 text-black text-center m-0">Location</h3>
                <div class="container d-flex justify-content-center">
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>admin/rental_page" class="text-light text-decoration-none">Location</a>
                    </button>

                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-between flex-column flex-sm-row">
            <div class="m-0 ">
                <h3 class="w-100 text-black text-center m-0">Atelier</h3>
                <div class="container d-flex justify-content-center">
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>admin/workshop_page" class="text-light text-decoration-none">Catégories</a>
                    </button>
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>admin/show_all_tasks" class="text-light text-decoration-none">Voir Tout</a>
                    </button>

                </div>
            </div>
            <div class="m-0">
                <h3 class="w-100 text-black text-center m-0">Vélos</h3>
                <div class="container d-flex justify-content-center">
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>admin/features_page" class="text-light text-decoration-none">Caractéristiques</a>
                    </button>
                    <button class="btn btn-secondary btn-lg text-light m-1">
                        <a href="<?= URL ?>admin/bikes_page" class="text-light text-decoration-none">Vélos</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

   

<?php endif ?>