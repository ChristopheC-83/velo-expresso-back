<h1 class="text-center my-4"><u>Les Cadres</u></h1>
<h2 class="text-center my-4">Liste & Ajout</h2>

<div class="container">

    <?php foreach($frames as $frame) : ?>
    <div class="d-flex justify-content-between align-items-center border border-dark p-2 my-2">
        <img src="<?= URL ?>public/assets/images/frames/<?= $frame['image'] ?>" alt="<?= $frame['btnText'] ?>"
            class=" logo-partner">
        <div class="d-flex flex-column flex-grow-1 ps-2 ps-md-4">
            <p><u>Titre :</u> <?= $frame['title'] ?></p>
            <p><u>Texte :</u> <?= $frame['text'] ?></p>
            <p><u>Lien du bouton :</u> <?= $frame['btnLink'] ?></p>
            <p><u>Texte dans le bouton :</u> <?= $frame['btnText'] ?></p>
            <p><u>Position :</u> <?= $frame['position'] ?></p>

            <form action="<?= URL ?>admin/frames/delete_frame" method="POST"
                onSubmit="return confirm('On confirme la suppression ?')">
                <input type="hidden" name="id" value=<?= $frame['id'] ?>>
                <button class="btn" type="submit"><i class="fa-solid fa-trash-can text-danger fs-5"></i></button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
    <h2 class="text-center my-3 p-0">Ajout d'une image dans le frame</h2>

    <form action="<?= URL ?>admin/frames/add_frame" method="post" class="d-flex flex-column "
        enctype="multipart/form-data">

        <label for="image" class="py-1 mt-1">Nouvelle image</label>
        <input type="file" class="text-primary fs-5 rounded mb-3" id="image" name="image"
            placeholder="Nom du partenaire">

        <label for="position" class="py-1 mt-1">Position</label>
        <input type="number" class="text-primary fs-5 rounded mb-3" id="position" name="position"
            placeholder="Position / classement">

        <label for="title" class="py-2 mt-1">Titre du frame</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="title" name="title"
            placeholder="Texte en haut de l'image">

        <label for="btnText" class="py-2 mt-1">Texte dans le cadre</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="btnText" name="text"
            placeholder="Texte au centre du cadre">

        <label for="btnText" class="py-2 mt-1">Texte dans le Bouton</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="btnText" name="btnText"
            placeholder="Texte visible dans le bouton">

        <label for="btnLink" class="py-2 mt-1">Lien du bouton</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="btnLink" name="btnLink"
            placeholder="Lien de redirection">



        <button class="col-12 btn btn-primary">
            <h2>Valider l'ajout du cadre</h2>
        </button>


    </form>


</div>