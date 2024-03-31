<h1 class="text-center my-4"><u>Création d'une fiche vélo</u></h1>
<h3 class="text-center ">En gras, les données obligatoires pour créer la fiche</h3>
<!-- <?=Tools::showArray($allDatasFeatures)?> -->



<div class="container mt-3 row w-100 mx-auto ">
    <form action="<?=URL?>admin/bikes/send_new_bike" method="post"
        class="d-flex flex-column gap-2 col-12 col-sm-10 col-md-8 col-lg-6 mx-auto" enctype="multipart/form-data">
        <!-- Visible du site, par défaut, non, input masqué  -->
        <input type="hidden" name="bike_visibility" id="bike_visibility" value="0">
        <h5 class="text-decoration-underline mt-3">Données obligatoires pour créer la fiche du vélo :</h5>
        <!-- photo -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_picture" class=" text-danger fw-bold">Photo du vélo *</label>
            <input type="file" name="bike_picture" id="bike_picture" class="p-1" required>
        </div>
        <!-- Marque -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_brand" class=" text-danger fw-bold">Marque *</label>
            <select name="bike_brand" id="bike_brand" class="p-1" required>
                <option value="">Choisir une marque</option>
                <?php foreach ($allDatasFeatures as $feature) : ?>
                <?php if($feature['feature'] === "brand"): ?>
                <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
        </div>
        <!-- Modele -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_model" class=" text-danger fw-bold">Modèle *</label>
            <input type="text" name="bike_model" id="bike_model" class="p-1" required>
        </div>
        <!-- neuf -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_new" class=" text-danger fw-bold">Neuf ? *</label>
            <select name="bike_new" id="bike_new" class="p-1" required>
                <option value="">Choisir l'état</option>
                <option value="new">Neuf</option>
                <option value="used">Occasion</option>
            </select>
        </div>
         <!-- prix -->
         <div class="d-flex flex-column gap-2">
            <label for="bike_price" class=" text-danger fw-bold">Prix du vélo (hors promo) *</label>
            <input type="text" name="bike_price" id="bike_price" class="p-1" required>
        </div>
        
        <h5 class="text-decoration-underline mt-3">Données pouvant être renseignées ultérieurement :</h5>
        <!-- type -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_type">Type de vélo</label>
            <select name="bike_type" id="bike_type" class="p-1" >
                <option value="">Choisir un type</option>
                <?php foreach ($allDatasFeatures as $feature) : ?>
                <?php if($feature['feature'] === "bike_type"): ?>
                <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
        </div>
        <!-- taille -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_type">Taille de vélo</label>
            <select name="bike_size" id="bike_size" class="p-1">
                <option value="">Choisir une taille</option>
                <?php foreach ($allDatasFeatures as $feature) : ?>
                <?php if($feature['feature'] === "size"): ?>
                <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
        </div>
        <!-- suspension -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_suspension">Type de suspension</label>
            <select name="bike_suspension" id="bike_suspension" class="p-1">
                <option value="">Type de suspensions</option>
                <?php foreach ($allDatasFeatures as $feature) : ?>
                <?php if($feature['feature'] === "suspension"): ?>
                <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
        </div>
        <!-- nb vitesses -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_speeds_number">Nombre de vitesses</label>
            <select name="bike_speeds_number" id="bike_speeds_number" class="p-1" >
                <option value="">Choisir le nombre de vitesses</option>
                <?php foreach ($allDatasFeatures as $feature) : ?>
                <?php if($feature['feature'] === "speeds_number"): ?>
                <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
        </div>
        <!-- transmission -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_transmission">Quelle transmission ?</label>
            <input type="text" name="bike_transmission" id="bike_transmission" class="p-1" >
        </div>
        <!-- dimension roues -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_wheels_dim">Diamètre des roues</label>
            <select name="bike_wheels_dim" id="bike_wheels_dim" class="p-1" >
                <option value="">Choisir le diamètre</option>
                <?php foreach ($allDatasFeatures as $feature) : ?>
                <?php if($feature['feature'] === "wheels_dim"): ?>
                <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
        </div>
        <!-- roues -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_wheels">Quelles Roues ?</label>
            <input type="text" name="bike_wheels" id="bike_wheels" class="p-1" >
        </div>
        <!-- freins -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_brake">Quels Freins ?</label>
            <input type="text" name="bike_brake" id="bike_brake" class="p-1" >
        </div>
        <!-- electrique -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_elec">Electrique ?</label>
            <select name="bike_elec" id="bike_elec" class="p-1" >
                <option value="">Choisir</option>
                <option value="1">oui, électrique</option>
                <option value="0">non, musculaire</option>
            </select>
        </div>
        <!-- détails elec -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_elec_detail">Si électrique, détails</label>
            <input type="text" name="bike_elec_detail" id="bike_elec_detail" class="p-1" >
        </div>
       
        <!-- promo -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_promo">Vélo en promo ?</label>
            <select name="bike_promo" id="bike_promo" class="p-1" >
                <option value="">Choisir</option>
                <option value="1">oui, en promo</option>
                <option value="0">non, prix normal</option>
            </select>
        </div>
        <!-- prix promo -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_price_promo">Si promo, nouveau prix</label>
            <input type="text" name="bike_price_promo" id="bike_price_promo" class="p-1" >
        </div>
        
        <!-- description -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_description">Description</label>
            <textarea name="bike_description" id="bike_description" cols="30" rows="10" ></textarea>
        </div>
        <!-- message perso -->
        <div class="d-flex flex-column gap-2">
            <label for="bike_msg_perso">Message perso</label>
            <textarea name="bike_msg_perso" id="bike_msg_perso" cols="30" rows="10" ></textarea>
        </div>

        <button type="submit" class="btn btn-secondary">Créer</button>
    </form>

</div>