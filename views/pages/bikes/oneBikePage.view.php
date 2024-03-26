<h1 class="text-center my-4"><u>Gestion d'un vélo</u></h1>
<h2 class="text-center"><?=$bike['bike_brand'] ." ". $bike['bike_model'] ." ". $bike['bike_new'] ?></h2>
<?=Tools::showArray($bike)?>
<div class="container mt-3">

    <div class="d-flex flex-column px-1 mx-auto my-3" style="width: calc(180px + 40vw)">
        <img src="<?=URL?>public/assets/images/bikes/<?=$bike['bike_picture'] ?>" alt="">
        <form action="<?=URL?>admin/bikes/change_picture" method="POST" enctype="multipart/form-data" class="mt-2">
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            <input type="file" name="new_picture" id="new_picture" required>
            <button type="submit" class="btn btn-primary">Changer l'image</button>
        </form>
    </div>
    <!-- Maj visibilité sur site -->
    <div class=" px-1 mx-auto my-3 " style="width: calc(180px + 40vw)">
        <form action="<?=URL?>admin/bikes/update_bike" method="POST" enctype="multipart/form-data"
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
    </div>

</div>