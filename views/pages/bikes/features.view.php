<h1 class="text-center my-4"><u>Gestion des caractéristiques</u></h1>
<h3 class="text-center">Ajouter une caractérique :</h3>
<!-- <?=Tools::showArray($allFeatures)?>
<?=Tools::showArray($allDatasFeatures)?> -->
<div class="container mt-3">
    <div class="row">
        <div class=" col-12 col-sm-10 col-lg-8 mx-auto ">
            <form action="<?= URL ?>admin/features/add_features" method="POST" class="row ">
                <select type="text" class="col-4 text-primary fs-5  rounded" id="feature" name="feature"
                    placeholder="Ajout d'une Tache">
                    <option value="">Caractéristique</option>
                    <?php foreach($allFeatures as $feature): ?>
                    <option value="<?= $feature['feature'] ?>"><?= $feature['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="number" class="col-2 text-primary fs-5 rounded mx-3" id="position" name="position"
                    placeholder="pos.">
                <input type="text" class="col-4 text-primary fs-5 rounded" id="name	" name="name"
                    placeholder="informations">
                <button class="col-1 btn btn-light">
                    <h1>✅</h1>
                </button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-5">
    <?php foreach($allFeatures as $feature): ?>
    <div class="d-flex border border-2 border-black rounded mb-2 align-items-center">
        <div class="col-4 h-100 ">
            <h3 class=" fs-5  text-center"><?= $feature['name'] ?></h3>
        </div>
        <div class="d-flex flex-column w-100 border-2 border-start ps-1">
            <?php foreach($allDatasFeatures as $data): ?>
            <div class="d-flex w-100 ">
                <?php if($data['feature'] === $feature['feature']): ?>
                <h3 class="col-2 fs-5 p-2 text-center"><?= $data['position'] ?></h3>
                <h3 class="col-6 fs-5 p-2"><?= $data['name'] ?></h3>
                <div class="col-2 fs-5 p-2">
                </div>
                <div class="col-2 fs-5 p-2">
                    <form action="<?= URL ?>admin/features/delete_feature" method="POST"
                        onSubmit="return confirm('On confirme la suppression de <?= $data['name'] ?> ?')">
                        <input type="hidden" name="id" value=<?= $data['id'] ?>>
                        <button class="btn" type="submit"><i class="fa-solid fa-trash-can  text-danger"></i></button>
                    </form>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
    <?php endforeach?>
</div>
</div>