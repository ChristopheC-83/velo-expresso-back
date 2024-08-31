<h1 class="text-center my-4"><u>Gestion d'un vélo</u></h1>
<h2 class="text-center"><?=$bike['bike_brand'] ." ". $bike['bike_model'] ." ". $bike['bike_new'] ?></h2>
<!-- <?=Tools::showArray($bike)?> -->
<div class="container mt-3">


    <!-- changement image -->
    <div class="d-flex flex-column px-1 mx-auto my-3" style="width: calc(180px + 40vw)">
        <img src="<?=URL?>public/assets/images/bikes/<?=$bike['bike_picture'] ?>" alt="">
        <form action="<?=URL?>admin/bikes/change_picture" method="POST" enctype="multipart/form-data"
            class="d-flex align-items-center mt-3">
            <input type="hidden" name="bike_id" value="<?= $bike['bike_id']  ?>">
            <input type="file" class="" name="new_picture" id="new_picture" required>
            <button type="submit" class="btn btn-primary ">Changer l'image</button>
        </form>
    </div>
    <hr>

    <!-- Changement de toutes les caractérisques en un formulaire unique -->
    <form action="<?= URL ?>admin/bikes/update_bike2" method="POST" class=" px-1 mx-auto my-3 "
        style="width: calc(180px + 40vw)">
        <input type="hidden" name="bike_id" value="<?= $bike['bike_id']  ?>">
        <input type="hidden" name="bike_picture" value="<?= $bike['bike_picture']  ?>">
        <!-- Maj visibilité sur site -->
        <label for="bike_visibility"><b>Visible</b> sur site ?</label>
        <select type="number" name="bike_visibility" id="bike_visibility" class="p-2 rounded mx-2" required>
            <?php if($bike['bike_visibility'] == 1) : ?>
            <option value=1>oui</option>
            <option value=0>non</option>
            <?php else : ?>
            <option value=0>non</option>
            <option value=1>oui</option>
            <?php endif?>
        </select>
        <hr>
        <!-- Maj état vendu ou pas -->
        <label for="bike_sold"><b>Vendu</b> sur site ?</label>
        <select type="number" name="bike_sold" id="bike_sold" class="p-2 rounded mx-2" required>
            <?php if($bike['bike_sold'] == 1) : ?>
            <option value=1>oui</option>
            <option value=0>non</option>
            <?php else : ?>
            <option value=0>non</option>
            <option value=1>oui</option>
            <?php endif?>
        </select>
        <hr>
        <!-- Maj Marque -->
        <label for="bike_brand">On change la <b>marque </b> ?</label><br>
        <select type="text" name="bike_brand" id="bike_brand" class="p-2 rounded" required>
            <option value="<?=$bike['bike_brand']?>"><?=$bike['bike_brand']?></option>
            <?php foreach($features as $feature) : ?>
            <?php if($feature['feature'] === "brand" && $feature['feature'] !== $bike['bike_brand']): ?>
            <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
            <?php endif; ?>
            <?php endforeach?>
        </select>
        <hr>
        <!-- Maj Modèle -->
        <label for="bike_model">On change le <b>modèle ?</b></label><br>
        <input type="text" name="bike_model" id="bike_model" class="p-2 rounded" value="<?=$bike['bike_model']?>"
            required>
        <hr>
        <!-- Maj nouveau -->
        <label for="bike_new">On change l'<b>état</b> (neuf ou pas) ?</label><br>
        <select type="text" name="bike_new" id="bike_new" class="p-2 rounded" required>
            <?php if($bike['bike_new'] === "used") : ?>
            <option value="used">occasion</option>
            <option value="new">neuf</option>
            <?php else : ?>
            <option value="new">neuf</option>
            <option value="used">occasion</option>
            <?php endif?>
        </select>
        <hr>
        <!-- Maj Type de vélo -->
        <label for="bike_type">On change le <b>type de vélo </b> ?</label><br>
        <select type="text" name="bike_type" id="bike_type" class="p-2 rounded" required>
            <?php if($bike['bike_type']): ?>
            <option value="<?=$bike['bike_type']?>"><?=$bike['bike_type']?></option>
            <?php endif ?>
            <?php foreach($features as $feature) : ?>
            <?php if($feature['feature'] === "bike_type" && $feature['feature'] !== $bike['bike_type']): ?>
            <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
            <?php endif; ?>
            <?php endforeach?>
        </select>
        <hr>
        <!-- Maj Taille de vélo -->
        <label for="bike_size">On change la <b>taille du vélo </b> ?</label><br>
        <select type="text" name="bike_size" id="bike_size" class="p-2 rounded" required>
            <?php if($bike['bike_size']): ?>
            <option value="<?=$bike['bike_size']?>"><?=$bike['bike_size']?></option>
            <?php endif ?>
            <?php foreach($features as $feature) : ?>
            <?php if($feature['feature'] === "size" && $feature['feature'] !== $bike['bike_size']): ?>
            <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
            <?php endif; ?>
            <?php endforeach?>
        </select>
        <hr>
        <!-- Maj Suspension du vélo -->
        <label for="bike_suspension">On change la <b>suspension du vélo</b> ?</label><br>
        <select type="text" name="bike_suspension" id="bike_suspension" class="p-2 rounded" required>
            <?php if($bike['bike_suspension']): ?>
            <option value="<?=$bike['bike_suspension']?>"><?=$bike['bike_suspension']?></option>
            <?php endif ?>
            <?php foreach($features as $feature) : ?>
            <?php if($feature['feature'] === "suspension" && $feature['feature'] !== $bike['bike_suspension']): ?>
            <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
            <?php endif; ?>
            <?php endforeach?>
        </select>
        <hr>
        <!-- Maj nombre de vitesses -->
        <label for="bike_speeds_number">On change le <b>nombre de vitesses du vélo </b> ?</label><br>
        <select type="text" name="bike_speeds_number" id="bike_speeds_number" class="p-2 rounded" required>
            <?php if($bike['bike_speeds_number']): ?>
            <option value="<?=$bike['bike_speeds_number']?>"><?=$bike['bike_speeds_number']?></option>
            <?php endif ?>
            <?php foreach($features as $feature) : ?>
            <?php if($feature['feature'] === "speeds_number" && $feature['feature'] !== $bike['bike_speeds_number']): ?>
            <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
            <?php endif; ?>
            <?php endforeach?>
        </select>
        <hr>
        <!-- Maj de la transmission -->
        <label for="bike_transmission">On change la <b>transmission </b> ?</label><br>
        <input type="text" name="bike_transmission" id="bike_transmission" class="p-2 rounded"
            value="<?=$bike['bike_transmission']?>">
        <hr>
        <!-- Maj dimension des roues -->
        <label for="bike_wheels_dim">On change la <b>dimension des roues </b> ?</label><br>
        <select type="text" name="bike_wheels_dim" id="bike_wheels_dim" class="p-2 rounded" required>
            <?php if($bike['bike_wheels_dim']): ?>
            <option value="<?=$bike['bike_wheels_dim']?>"><?=$bike['bike_wheels_dim']?></option>
            <?php endif ?>
            <?php foreach($features as $feature) : ?>
            <?php if($feature['feature'] === "wheels_dim" && $feature['feature'] !== $bike['bike_wheels_dim']): ?>
            <option value="<?= $feature['name'] ?>"><?= $feature['name'] ?></option>
            <?php endif; ?>
            <?php endforeach?>
        </select>
        <hr>
        <!-- Maj des roues -->
        <label for="bike_wheels">On change les <b>roues </b> ?</label><br>
        <input type="text" name="bike_wheels" id="bike_wheels" class="p-2 rounded" value="<?=$bike['bike_wheels']?>">
        <hr>
        <!-- Maj des freins -->
        <label for="bike_brake">On change les <b>freins</b> ?</label><br>
        <input type="text" name="bike_brake" id="bike_brake" class="p-2 rounded" value=" <?=$bike['bike_brake']?> ">
        <hr>
        <!-- Maj electrique ? -->
        <label for="bike_elec">Vélo Electrique ?</label>
        <select type="number" name="bike_elec" id="bike_elec" class="p-2 rounded mx-2" required>
            <?php if($bike['bike_elec'] == 1) : ?>
            <option value=1>oui</option>
            <option value=0>non</option>
            <?php else : ?>
            <option value=0>non</option>
            <option value=1>oui</option>
            <?php endif?>
        </select>
        <hr>
        <!-- Maj des détails elec -->
        <label for="bike_elec_detail">On change les <b>détails elec (moteur/batterie...) </b> ?</label><br>
        <input type="text" name="bike_elec_detail" id="bike_elec_detail" class="p-2 rounded"
            value="<?=$bike['bike_elec_detail']?>">
        <hr>
        <!-- Maj du prix -->
        <label for="bike_price">On change le <b>prix du vélo </b> ?</label><br>
        <input type="number" name="bike_price" id="bike_price" class="p-2 rounded" value="<?=$bike['bike_price']?>"
            required>
        <hr>
        <!-- Maj promo ?  si velo neuf-->
        <label for="bike_promo">Vélo en promo ?</label>
        <select type="number" name="bike_promo" id="bike_promo" class="p-2 rounded mx-2">
            <?php if($bike['bike_promo'] == 1) : ?>
            <option value=1>oui</option>
            <option value=0>non</option>
            <?php else : ?>
            <option value=0>non</option>
            <option value=1>oui</option>
            <?php endif?>
        </select>
        <hr>
        <!-- Maj du prix promo -->
        <label for="bike_price_promo">On change le <b>prix promo du vélo </b> ?</label><br>
        <input type="number" name="bike_price_promo" id="bike_price_promo" class="p-2 rounded"
            value="<?=$bike['bike_price_promo']?>">
        <hr>
        <!-- Maj de la description -->
        <label for="bike_description">On change la <b>description du vélo : </b></label><br>
        <textarea name="bike_description" id="bike_description" class="p-2 rounded w-50" rows="8"
            style="min-width:250px"><?=$bike['bike_description']?></textarea>
        <hr>
        <!-- Maj de la message perso -->
        <label for="bike_msg_perso">On change le <b>message perso : </b></label><br>
        <textarea name="bike_msg_perso" id="bike_msg_perso" class="p-2 rounded w-50" rows="8"
            style="min-width:250px"><?=$bike['bike_msg_perso']?></textarea>
        <hr>
        <button type="submit" class="btn btn-primary w-100 fs-3 p-2">Mettre à jour le
            <b><?=$bike['bike_brand'] ." ". $bike['bike_model']  ?></b></button>
    </form>
    
    </div>