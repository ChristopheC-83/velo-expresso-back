<h1 class="text-center my-4"><u>Les Cadres</u></h1>
<h2 class="text-center my-4">Liste & Ajout</h2>

<div class="container">

    <?php foreach($frames as $frame) : ?>
    <div class="d-flex justify-content-between align-items-center border border-dark p-2 my-2">
        <img src="<?= URL ?>public/assets/images/frames/<?= $frame['image'] ?>" alt="<?= $frame['btnText'] ?>"
            class=" logo-partner">
        <div class="d-flex flex-column flex-grow-1 ps-2 ps-md-4">
        <form action="update_frame" method="POST">
                <input type="hidden" value="<?= $frame['id'] ?>" name="id">
                <label for="title"><u>Titre :</u></label><br>
                <input type="text" value="<?= $frame['title'] ?>" name="title" class="w-100 rounded mt-1 mb-2 p-1"><br>
                <label for="text"><u>Texte :</u></label><br>
                <input type="text" value="<?= $frame['text'] ?>" name="text" class="w-100 rounded mt-1 mb-2 p-1"><br>
                <label for="btnLink"><u>Lien du bouton :</u></label><br>
                <input type="text" value="<?= $frame['btnLink'] ?>" name="btnLink"
                    class="w-100 rounded mt-1 mb-2 p-1"><br>
                <label for="btnText"><u>Texte dans le bouton :</u></label><br>
                <input type="text" value="<?= $frame['btnText'] ?>" name="btnText"
                    class="w-100 rounded mt-1 mb-2 p-1"><br>
                <label for="position"><u>Position :</u></label><br>
                <input type="text" value="<?= $frame['position'] ?>" name="position"
                    class="w-100 rounded mt-1 mb-2 p-1">
                <button type="submit" class="btn btn-primary mt-2">Valider les modifications</button>
            </form>

            <form action="<?= URL ?>admin/frames/delete_frame" method="POST"
                onSubmit="return confirm('On confirme la suppression ?')">
                <input type="hidden" name="id" value=<?= $frame['id'] ?>>
                    <button class="btn btn-danger mt-3" type="submit">Supprimer le cadre</button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
    <h2 class="text-center my-3 p-0">Ajout d'une image dans le frame</h2>

    <form action="<?= URL ?>admin/frames/add_frame" method="post" class="d-flex flex-column "
        enctype="multipart/form-data">

        <label for="image" class="py-1 mt-1  text-danger fw-bold">Nouvelle image</label>
        <input type="file" class="text-primary fs-5 rounded mb-3" id="image" name="image"
            placeholder="Nom du partenaire">

        <label for="position" class="py-1 mt-1  text-danger fw-bold">Position</label>
        <input type="number" class="text-primary fs-5 rounded mb-3" id="position" name="position"
            placeholder="Position / classement">

        <label for="title" class="py-2 mt-1  text-danger fw-bold">Titre du frame</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="title" name="title"
            placeholder="Texte en haut de l'image">

        <label for="btnText" class="py-2 mt-1 ">Texte dans le cadre</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="btnText" name="text"
            placeholder="Texte au centre du cadre">

        <label for="btnText" class="py-2 mt-1  text-danger fw-bold">Texte dans le Bouton</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="btnText" name="btnText"
            placeholder="Texte visible dans le bouton">

        <label for="btnLink" class="py-2 mt-1  text-danger fw-bold">Lien du bouton</label>
        <input type="text" class="text-primary fs-5 rounded mb-3" id="btnLink" name="btnLink"
            placeholder="Lien de redirection">



        <button class="col-12 btn btn-primary">
            <h2>Valider l'ajout du cadre</h2>
        </button>


    </form>


</div>