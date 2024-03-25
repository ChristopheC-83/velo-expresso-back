<h1 class="text-center my-4"><u>Création d'une fiche vélo</u></h1>
<!-- <?=Tools::showArray($allDatasFeatures)?> -->



<div class="container mt-3 row w-100 mx-auto ">
    <form action="<?=URL?>bikes/create_bike" method="post"
        class="d-flex flex-column gap-2 col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
        <!-- Marque -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_brand">Marque</label>
            <select name="bike_brand" id="bike_brand" required>
                <option value="">Choisir une marque</option>
                <?php foreach ($allDatasFeatures as $feature) : ?>
                <?php if($feature['feature'] === "brand"): ?>
                <option value="<?= $feature['data'] ?>"><?= $feature['data'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
        </div>
        <!-- Modele -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_model">Modèle</label>
            <input type="text" name="bike_model" id="bike_model" required>
        </div>
        <!-- neuf -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_new">Neuf ?</label>
            <select name="bike_new" id="bike_new" required>
                <option value="">Choisir l'état</option>
                <option value="1">Neuf</option>
                <option value="0">Occasion</option>
            </select>
        </div>
        <!-- type -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_type">Type de vélo</label>
            <select name="bike_type" id="bike_type" required>
                <option value="">Choisir un type</option>
                <?php foreach ($allDatasFeatures as $feature) : ?>
                <?php if($feature['feature'] === "bike_type"): ?>
                <option value="<?= $feature['data'] ?>"><?= $feature['data'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
        </div>


        <!-- taille -->
        <!-- suspension -->
        <!-- nb vitesses -->
        <!-- transmission -->
        <!-- dimension roues -->
        <!-- roues -->
        <!-- freins -->
        <!-- electrique -->
        <!-- détails elec -->
        <!-- prix -->
        <!-- promo -->
        <!-- prix promo -->






        <div class="d-flex flex-column gap-2">
            <label for="price">Prix</label>
            <input type="number" name="price" id="price" required>
        </div>
        <div class="d-flex flex-column gap-2">
            <label for="year">Année</label>
            <input type="number" name="year" id="year" required>
        </div>
        <div class="d-flex flex-column gap-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" required></textarea>
        </div>

        <div class="d-flex flex-column gap-2">
            <label for="feature">Caractéristique</label>
            <select name="feature" id="feature" required>
                <?php foreach ($allDatasFeatures as $feature) : ?>
                <option value="<?= $feature['id'] ?>"><?= $feature['feature'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Créer</button>
    </form>

</div>