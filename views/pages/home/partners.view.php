<!-- gestion des logos ds partenaires -->

<h1 class="text-center my-4"><u>Les Partenaires</u></h1>
<h2 class="text-center my-4">Liste & Ajout</h2>

<div class="container">

    <?php foreach($allPartners as $partner) : ?>
    <div class="d-flex justify-content-between align-items-center border border-dark p-2 my-2">
        <img src="<?= URL ?>public/assets/images/partners/<?= $partner['logo'] ?>" alt="<?= $partner['name'] ?>"
            class=" logo-partner">
        <div class="d-flex flex-column flex-grow-1 ps-2 ps-md-4">


            <form action="update_partner" method="POST">
                <input type="hidden" value="<?= $partner['id'] ?>" name="id">
                <label for="name"><u>Partenaire :</u></label><br>
                <input type="text" value="<?= $partner['name'] ?>" name="name"
                    class="w-100 rounded mt-1 mb-2 p-1"><br>
                <label for="link"><u>Lien du site partenaire :</u></label><br>
                <input type="text" value="<?= $partner['link'] ?>" name="link"
                    class="w-100 rounded mt-1 mb-2 p-1"><br>
                <label for="position"><u>Position :</u></label><br>
                <input type="text" value="<?= $partner['position'] ?>" name="position"
                    class="w-100 rounded mt-1 mb-2 p-1">
                <button type="submit" class="btn btn-primary mt-2">Valider les modifications</button>
            </form>
            <form action="<?= URL ?>admin/partners/delete_partner" method="POST"
                onSubmit="return confirm('On confirme la suppression ?')">
                <input type="hidden" name="id" value=<?= $partner['id'] ?>>
                <button class="btn btn-danger mt-3" type="submit">Supprimer le partenaire</button>
            </form>
        </div>
    </div>


    <?php endforeach; ?>
    <h2 class="text-center my-2 p-0">Ajout d'un partenaire</h2>
    <form action="<?= URL ?>admin/partners/add_partner" method="post" class="d-flex flex-column "
        enctype="multipart/form-data">

        <label for="name" class="py-2 mt-1 text-danger fw-bold">Nom du nouveau partenaire</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="name" name="name" placeholder="Nom du partenaire">

        <label for="link" class="py-2 mt-1 text-danger fw-bold">Lien du site du nouveau partenaire</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="link" name="link"
            placeholder="Lien du partenaire">

        <label for="position" class="py-2 mt-1 text-danger fw-bold">Position</label>
        <input type="number" class="text-primary fs-5 rounded mb-3" id="position" name="position"
            placeholder="Position du partenaire">

        <label for="item" class="py-2 mt-1  text-danger fw-bold">Logo du nouveau partenaire</label>
        <input type="file" class="text-primary fs-5 rounded mb-3" id="logo" name="logo"
            placeholder="Logo du partenaire">
        <button class="col-12 btn btn-primary">
            <h2>Valider l'ajout</h2>
        </button>


    </form>


</div>