<h1 class="text-center my-4"><u>Gestion d'un vélo</u></h1>
<h2 class="text-center"><?=$bike['bike_brand'] ." ". $bike['bike_model'] ." ". $bike['bike_new'] ?></h2>
<!-- <?=Tools::showArray($bike)?> -->
<div class="container mt-3">


<!-- Sur cette page, chaque caractéristique est modifiable indépendamment des autres -->
<!-- Cette vue n'est plus renvoyée dans le projet mais gardée... au cas où...😅 -->

    <!-- changement image -->
    <div class="d-flex flex-column px-1 mx-auto my-3" style="width: calc(180px + 40vw)">
        <img src="<?=URL?>public/assets/images/bikes/<?=$bike['bike_picture'] ?>" alt="">
        <form action="<?=URL?>admin/bikes/change_picture" method="POST" enctype="multipart/form-data" class="mt-2">
            <input type="hidden" class="pt-2" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="file" class="pt-2" name="new_picture" id="new_picture" required>
            <button type="submit" class="btn btn-primary mt-2">Changer l'image</button>
        </form>
    </div>
    <hr>
    <!-- Maj visibilité sur site -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST"
            class="mt-2 mx-auto w-100 d-flex justify-content-start align-items-center">
            <label for="bike_visibility">Visible sur site ?</label>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_visibility">
            <select type="number" name="new_value" id="new_value" class="p-2 rounded mx-2" required>
                <?php if($bike['bike_visibility'] == 1) : ?>
                <option value=1>oui</option>
                <option value=0>non</option>
                <?php else : ?>
                <option value=0>non</option>
                <option value=1>oui</option>
                <?php endif?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj Marque -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_brand">On change la <b>marque </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_brand">
            <select type="text" name="new_value" id="new_value" class="p-2 rounded" required>
                <option value="<?=$bike['bike_brand']?>"><?=$bike['bike_brand']?></option>
                <?php foreach($features as $feature) : ?>
                <?php if($feature['feature'] === "brand" && $feature['feature'] !== $bike['bike_brand']): ?>
                <option value="<?= $feature['data'] ?>"><?= $feature['data'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj Modèle -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_model">On change le <b>modèle ?</b></label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_model">
            <input type="text" name="new_value" id="new_value" class="p-2 rounded" value="<?=$bike['bike_model']?>"
                required>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj nouveau -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_new">On change l'<b>état</b> (neuf ou pas) ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_new">
            <select type="text" name="new_value" id="new_value" class="p-2 rounded" required>
                <?php if($bike['bike_new'] === "used") : ?>
                <option value="used">occasion</option>
                <option value="new">neuf</option>
                <?php else : ?>
                <option value="new">neuf</option>
                <option value="used">occasion</option>
                <?php endif?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj Type de vélo -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_type">On change le <b>type de vélo </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_type">
            <select type="text" name="new_value" id="new_value" class="p-2 rounded" required>
                <?php if($bike['bike_type']): ?>
                <option value="<?=$bike['bike_type']?>"><?=$bike['bike_type']?></option>
                <?php endif ?>
                <?php foreach($features as $feature) : ?>
                <?php if($feature['feature'] === "bike_type" && $feature['feature'] !== $bike['bike_type']): ?>
                <option value="<?= $feature['data'] ?>"><?= $feature['data'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj Taille de vélo -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_size">On change la <b>taille du vélo </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_size">
            <select type="text" name="new_value" id="new_value" class="p-2 rounded" required>
                <?php if($bike['bike_size']): ?>
                <option value="<?=$bike['bike_size']?>"><?=$bike['bike_size']?></option>
                <?php endif ?>
                <?php foreach($features as $feature) : ?>
                <?php if($feature['feature'] === "size" && $feature['feature'] !== $bike['bike_size']): ?>
                <option value="<?= $feature['data'] ?>"><?= $feature['data'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj Suspension du vélo -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_suspension">On change la <b>suspension du vélo</b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_suspension">
            <select type="text" name="new_value" id="new_value" class="p-2 rounded" required>
                <?php if($bike['bike_suspension']): ?>
                <option value="<?=$bike['bike_suspension']?>"><?=$bike['bike_suspension']?></option>
                <?php endif ?>
                <?php foreach($features as $feature) : ?>
                <?php if($feature['feature'] === "suspension" && $feature['feature'] !== $bike['bike_suspension']): ?>
                <option value="<?= $feature['data'] ?>"><?= $feature['data'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj nombre de vitesses -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_speeds_number">On change le <b>nombre de vitesses du vélo </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_speeds_number">
            <select type="text" name="new_value" id="new_value" class="p-2 rounded" required>
                <?php if($bike['bike_speeds_number']): ?>
                <option value="<?=$bike['bike_speeds_number']?>"><?=$bike['bike_speeds_number']?></option>
                <?php endif ?>
                <?php foreach($features as $feature) : ?>
                <?php if($feature['feature'] === "speeds_number" && $feature['feature'] !== $bike['bike_speeds_number']): ?>
                <option value="<?= $feature['data'] ?>"><?= $feature['data'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj de la transmission -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_visibility">On change la <b>transmission </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_transmission">
            <input type="text" name="new_value" id="new_value" class="p-2 rounded"
                value="<?=$bike['bike_transmission']?>" required>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj dimansion des roues -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_wheels_dim">On change la <b>dimension des roues </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_wheels_dim">
            <select type="text" name="new_value" id="new_value" class="p-2 rounded" required>
                <?php if($bike['bike_wheels_dim']): ?>
                <option value="<?=$bike['bike_wheels_dim']?>"><?=$bike['bike_wheels_dim']?></option>
                <?php endif ?>
                <?php foreach($features as $feature) : ?>
                <?php if($feature['feature'] === "wheels_dim" && $feature['feature'] !== $bike['bike_wheels_dim']): ?>
                <option value="<?= $feature['data'] ?>"><?= $feature['data'] ?></option>
                <?php endif; ?>
                <?php endforeach?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj des roues -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_wheels">On change les <b>roues </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_wheels">
            <input type="text" name="new_value" id="new_value" class="p-2 rounded" value="<?=$bike['bike_wheels']?>"
                required>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj des freins -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_brake">On change les <b>freins</b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_brake">
            <input type="text" name="new_value" id="new_value" class="p-2 rounded" value=" <?=$bike['bike_brake']?> "
                required>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj electrique ? -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST"
            class="mt-2 mx-auto w-100 d-flex justify-content-start align-items-center">
            <label for="bike_elec">Vélo Electrique ?</label>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_elec">
            <select type="number" name="new_value" id="new_value" class="p-2 rounded mx-2" required>
                <?php if($bike['bike_elec'] == 1) : ?>
                <option value=1>oui</option>
                <option value=0>non</option>
                <?php else : ?>
                <option value=0>non</option>
                <option value=1>oui</option>
                <?php endif?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj des détails elec -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_elec_detail">On change les <b>détails elec (moteur/batterie...) </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_elec_detail">
            <input type="text" name="new_value" id="new_value" class="p-2 rounded"
                value="<?=$bike['bike_elec_detail']?>" required>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj du prix -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_price">On change le <b>prix du vélo </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_price">
            <input type="number" name="new_value" id="new_value" class="p-2 rounded" value="<?=$bike['bike_price']?>"
                required>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj promo ?  si velo neuf-->
    <?php if($bike['bike_new'] === "new") : ?>
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST"
            class="mt-2 mx-auto w-100 d-flex justify-content-start align-items-center">
            <label for="bike_promo">Vélo en promo ?</label>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_promo">
            <select type="number" name="new_value" id="new_value" class="p-2 rounded mx-2" required>
                <?php if($bike['bike_promo'] == 1) : ?>
                <option value=1>oui</option>
                <option value=0>non</option>
                <?php else : ?>
                <option value=0>non</option>
                <option value=1>oui</option>
                <?php endif?>
            </select>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <!-- Maj du prix promo -->
    <?php if($bike['bike_promo'] == 1) : ?>
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_price_promo">On change le <b>prix promo du vélo </b> ?</label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_price_promo">
            <input type="number" name="new_value" id="new_value" class="p-2 rounded"
                value="<?=$bike['bike_price_promo']?>" required>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <hr>
    <?php endif ?>
    <?php endif ?>
    <!-- Maj de la description -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_description">On change la <b>description du vélo : </b></label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_description">
            <textarea name="new_value" id="new_value" class="p-2 rounded w-50" rows="8" style="min-width:250px"
                required><?=$bike['bike_description']?></textarea>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>
    <!-- Maj de la message perso -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" class="mt-2 mx-auto w-100 ">
            <label for="bike_msg_perso">On change le <b>message perso : </b></label><br>
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="hidden" name="to_update" value="bike_msg_perso">
            <textarea name="new_value" id="new_value" class="p-2 rounded w-50" rows="8" style="min-width:250px"
                required><?=$bike['bike_msg_perso']?></textarea>
            <button type="submit" class="p-0 border border-0 fs-2">🔄️</button>
        </form>
    </div>


</div>