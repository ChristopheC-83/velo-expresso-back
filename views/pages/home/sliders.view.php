<h1 class="text-center my-4"><u>Les Sliders</u></h1>
<h2 class="text-center my-4">Liste & Ajout</h2>

<div class="container">

    <?php foreach($sliders as $slider) : ?>
    <div class="d-flex justify-content-between align-items-center border border-dark p-2 my-2">
        <img src="<?= URL ?>public/assets/images/slider/<?= $slider['image'] ?>" alt="<?= $slider['btnText'] ?>"
            class=" logo-partner <?= $slider['overlay']===1 ? "overlay" : ""     ?>">
        <div class="d-flex flex-column flex-grow-1 ps-2 ps-md-4">
            <p><u>Titre :</u> <?= $slider['title'] ?></p>
            <p><u>Lien du bouton :</u> <?= $slider['btnLink'] ?></p>
            <p><u>Texte dans le bouton :</u> <?= $slider['btnText'] ?></p>
            <p><u>Position :</u> <?= $slider['position'] ?></p>
            <?php if($slider['overlay'] === 0) : ?>
                <form action="overlay_slider" method="POST">
                    <input type="hidden" value="<?= $slider['slider_id'] ?>" name="slider_id">
                    <input type="hidden" value=1 name="overlay">
                    <button class="btn btn-success">Assombrir l'image</button>
                </form>
            <?php elseif ($slider['overlay'] === 1): ?>
                <form action="overlay_slider" method="POST">
                    <input type="hidden" value="<?= $slider['slider_id'] ?>" name="slider_id">
                    <input type="hidden" value=0 name="overlay">
                    <button class="btn btn-warning">Eclaircir l'image</button>
                </form>
            <?php endif; ?>


            


           



            <form action="<?= URL ?>admin/slider/delete_slider" method="POST"
                onSubmit="return confirm('On confirme la suppression ?')">
                <input type="hidden" name="id" value=<?= $slider['slider_id'] ?>>
                <button class="btn" type="submit"><i class="fa-solid fa-trash-can text-danger fs-5"></i></button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
<h2 class="text-center my-2 p-0">Ajout d'une image dans le slider</h2>

    <form action="<?= URL ?>admin/slider/add_slider" method="post" class="d-flex flex-column "
        enctype="multipart/form-data">

        <label for="image" class="py-1 mt-1">Nouvelle image</label>
        <input type="file" class="text-primary fs-5 rounded mb-3" id="image" name="image"
            placeholder="Nom du partenaire">

        <label for="position" class="py-1 mt-1">Position</label>
        <input type="number" class="text-primary fs-5 rounded mb-3" id="position" name="position"
            placeholder="Position dans le slider">

        <label for="title" class="py-2 mt-1">Titre du Slider</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="title" name="title"
            placeholder="Texte au centre de l'image">

        <label for="btnText" class="py-2 mt-1">Texte dans le Bouton</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="btnText" name="btnText"
            placeholder="Texte visible dans le bouton">

        <label for="btnLink" class="py-2 mt-1">Lien du bouton</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="btnLink" name="btnLink"
            placeholder="Lien de redirection">



        <button class="col-12 btn btn-primary">
            <h2>Valider l'ajout de l'image dans le slider</h2>
        </button>


    </form>


</div>