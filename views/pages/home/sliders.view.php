<!-- gestion du slider en haut de la page d'accueil -->

<h1 class="text-center my-4"><u>Les Sliders</u></h1>
<h2 class="text-center my-4">Liste & Ajout</h2>

<div class="container">

    <?php foreach($sliders as $slider) : ?>
    <div class="d-flex justify-content-between align-items-center border border-dark p-2 my-2">
        <img src="<?= URL ?>public/assets/images/slider/<?= $slider['image'] ?>" alt="<?= $slider['btnText'] ?>"
            class=" logo-partner <?= $slider['overlay']===1 ? "overlay" : ""     ?>">
        <div class="d-flex flex-column flex-grow-1 ps-2 ps-md-4">
            <form action="update_slider" method="POST">
                <input type="hidden" value="<?= $slider['id'] ?>" name="id">
                <label for="title"><u>Titre :</u></label><br>
                <input type="text" value="<?= $slider['title'] ?>" name="title" class="w-100 rounded mt-1 mb-2 p-1"><br>
                <label for="btnLink"><u>Lien du bouton :</u></label><br>
                <input type="text" value="<?= $slider['btnLink'] ?>" name="btnLink"
                    class="w-100 rounded mt-1 mb-2 p-1"><br>
                <label for="btnText"><u>Texte dans le bouton :</u></label><br>
                <input type="text" value="<?= $slider['btnText'] ?>" name="btnText"
                    class="w-100 rounded mt-1 mb-2 p-1"><br>
                <label for="position"><u>Position :</u></label><br>
                <input type="text" value="<?= $slider['position'] ?>" name="position"
                    class="w-100 rounded mt-1 mb-2 p-1">
                <button type="submit" class="btn btn-primary mt-2">Valider les modifications</button>
            </form>

            <div class="d-flex align-items-center gap-3">
                <?php if($slider['overlay'] === 0) : ?>
                <form action="overlay_slider" method="POST">
                    <input type="hidden" value="<?= $slider['id'] ?>" name="id">
                    <input type="hidden" value=1 name="overlay">
                    <button class="btn btn-dark my-3">Assombrir l'image</button>
                </form>
                <?php elseif ($slider['overlay'] === 1): ?>
                <form action="overlay_slider" method="POST">
                    <input type="hidden" value="<?= $slider['id'] ?>" name="id">
                    <input type="hidden" value=0 name="overlay">
                    <button class="btn btn-warning my-3">Eclaircir l'image</button>
                </form>
                <?php endif; ?>
                <form action="<?= URL ?>admin/slider/delete_slider" method="POST"
                    onSubmit="return confirm('On confirme la suppression ?')">
                    <input type="hidden" name="id" value=<?= $slider['id'] ?>>
                    <button class="btn btn-danger" type="submit">Supprimer le Slider</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <h2 class="text-center mb-2 mt-5 p-0">Ajout d'une image dans le slider</h2>

    <form action="<?= URL ?>admin/slider/add_slider" method="post" class="d-flex flex-column "
        enctype="multipart/form-data">

        <label for="image" class="py-1 mt-1 text-danger fw-bold">Nouvelle image</label>
        <input type="file" class="text-primary fs-5 rounded mb-2 p-1" id="image" name="image"
            placeholder="Nom du partenaire">

        <label for="position" class="py-1 mt-1">Position</label>
        <input type="number" class="text-primary fs-5 rounded mb-2 p-1" id="position" name="position"
            placeholder="Position dans le slider">

        <label for="title" class="py-2 mt-1">Titre du Slider</label>
        <input type="text" class="text-primary fs-5 rounded mb-2 p-1" id="title" name="title"
            placeholder="Texte au centre de l'image">

        <label for="btnText" class="py-2 mt-1">Texte dans le Bouton</label>
        <input type="text" class="text-primary fs-5 rounded mb-2 p-1" id="btnText" name="btnText"
            placeholder="Texte visible dans le bouton">

        <label for="btnLink" class="py-2 mt-1">Lien du bouton</label>
        <input type="text" class="text-primary fs-5 rounded mb-2 p-1" id="btnLink" name="btnLink"
            placeholder="Lien de redirection">



        <button class="col-12 btn btn-primary mt-2">
            <h2>Valider l'ajout de l'image dans le slider</h2>
        </button>


    </form>


</div>