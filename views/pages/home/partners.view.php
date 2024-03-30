<h1 class="text-center my-4"><u>Les Partenaires</u></h1>
<h2 class="text-center my-4">Liste & Ajout</h2>

<div class="container">

    <?php foreach($allPartners as $partner) : ?>
        <div class="d-flex justify-content-between align-items-center border border-dark p-2 my-2">
            <img src="<?= URL ?>public/assets/images/partners/<?= $partner['logo'] ?>" alt="<?= $partner['name'] ?>" class=" logo-partner">
            <div class="d-flex flex-column flex-grow-1 ps-2 ps-md-4">
                <p><u>Partenaire :</u> <?= $partner['name'] ?></p>
                <p><u>Lien :</u> <?= $partner['link'] ?></p>
                <p><u>Position :</u> <?= $partner['position'] ?></p>
                <form action="<?= URL ?>admin/partners/delete_partner" method="POST" onSubmit="return confirm('On confirme la suppression ?')">
                        <input type="hidden" name="id" value=<?= $partner['id_partner'] ?>>
                        <button class="btn" type="submit"><i class="fa-solid fa-trash-can text-danger fs-5"></i></button>
                    </form>
            </div>
        </div>


<?php endforeach; ?>
<h2 class="text-center my-2 p-0">Ajout d'un partenaire</h2>
    <form action="<?= URL ?>admin/partners/add_partner" method="post" class="d-flex flex-column " enctype="multipart/form-data">

        <label for="name" class="py-2 mt-1 text-danger fw-bold">Nom du nouveau partenaire</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="name" name="name" placeholder="Nom du partenaire">
        
        <label for="link" class="py-2 mt-1 text-danger fw-bold">Lien du site du nouveau partenaire</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="link" name="link" placeholder="Lien du partenaire">

        <label for="position" class="py-2 mt-1 text-danger fw-bold">Position</label>
        <input type="number" class="text-primary fs-5 rounded mb-3" id="position" name="position" placeholder="Position du partenaire">
        
        <label for="item" class="py-2 mt-1  text-danger fw-bold">Logo du nouveau partenaire</label>
        <input type="file" class="text-primary fs-5 rounded mb-3" id="logo" name="logo" placeholder="Logo du partenaire">
        <button class="col-12 btn btn-primary">
            <h2>Valider l'ajout</h2>
        </button>


    </form>


</div>