<h1 class="text-center my-4"><u>Gestion d'un vélo</u></h1>
<h2 class="text-center"><?=$bike['bike_brand'] ." ". $bike['bike_model'] ." ". $bike['bike_new'] ?></h2>
<!-- <?=Tools::showArray($bike)?> -->
<div class="container mt-3">

    <div class="d-flex flex-column px-1 mx-auto my-3" style="width: calc(180px + 40vw)">
        <img src="<?=URL?>public/assets/images/bikes/<?=$bike['bike_picture'] ?>" alt="">
        <form action="<?=URL?>admin/bikes/change_picture" method="POST" enctype="multipart/form-data" class="mt-2">
            <input type="hidden" name="bike_id" value="<?=$bike['bike_id']?>">
            
            <input type="file" name="new_picture" id="new_picture" required>
            <button type="submit" class="btn btn-primary">Changer l'image</button>
    </div>

</div>