<h1 class="text-center my-4"><u>Atelier</u></h1>
<div class="container">
    <!-- <?= Tools::showArray($categories)  ?> -->
    <div class="row w-100 border p-3 fw-bold">
        <div class="col-5">Catégories</div>
        <div class="col-3 text-center">Positions</div>
        <div class="col-2 text-center">Modifier</div>
        <div class="col-2 text-center">Supp.</div>
    </div>
    <?php foreach ($categories as $category) : ?>
        <?php if (empty($_POST['id']) || $_POST['id'] != $category['cat_id']) : ?>
            <div class="row w-100 border p-2">
                <div class="col-5 text-capitalize"><a href="<?= URL ?>admin/workshop/<?= $category['cat_name'] ?>"><?= $category['cat_name'] ?></a></div>
                <div class="col-3 text-center"><?= $category['position'] ?></div>
                <div class="col-2 text-center text-secondary">
                    <form method="POST" action="">
                        <input type="hidden" name="id" value=<?= $category['cat_id'] ?>>
                        <button class="btn" type="submit"><i class="fa-solid fa-pen text-secondary"></i></button>
                    </form>
                </div>
                <div class="col-2 text-center">
                    <form action="<?= URL ?>admin/delete_category" method="POST" onSubmit="return confirm('On confirme la suppression ?')">
                        <input type="hidden" name="id" value=<?= $category['cat_id'] ?>>
                        <button class="btn" type="submit"><i class="fa-solid fa-trash-can  text-danger"></i></button>
                    </form>
                </div>
            </div>
        <?php else :  ?>
            <form method="POST" action="<?= URL ?>admin/modify_category">
                <div class="row w-100 border p-2">
                    <input type="hidden" name="id" value=<?= $category['cat_id'] ?>>
                    <div class="col-5">
                        <input type="text" value="<?= $category['cat_name'] ?>" name="new_cat_name">
                    </div>
                    <div class="col-3 text-center">
                        <input type="number" name="new_cat_position" value="<?= $category['position'] ?>">
                    </div>
                    <div class="col-4 text-center text-secondary">
                        <button class="btn btn-warning" type="submit">valider la modification</button>
                    </div>
                </div>
            </form>
        <?php endif ?>
    <?php endforeach; ?>
</div>


<!-- ajout d'une catégorie -->
<div class="container mt-5">
    <div class="row">
        <div class=" col-11 col-sm-10 col-lg-8 mx-auto">
            <form action="<?= URL ?>admin/send_new_category" method="POST" class="row">
                <input type="text" class="col-7 text-primary fs-5  rounded" id="new_category" name="new_category" placeholder="Ajout d'une Catégorie">
                <input type="number" class="col-3 text-primary fs-5 rounded mx-2 " id="new_position" name="new_position" placeholder="sa position">
                <button class="col-1 btn btn-light">
                    <h1>✅</h1>
                </button>
            </form>
        </div>
    </div>
</div>