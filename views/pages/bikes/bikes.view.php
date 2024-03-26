<h1 class="text-center my-4"><u>Gestion des vélos</u></h1>
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-2">
    <a href="<?=URL?>admin/bikes/create_bike"><button class="btn btn-secondary fs-3">Créer un Vélo</button></a>
    <div class="d-flex flexMid gap-2">
        <a href="<?=URL?>bikes/create_bike"><button class="btn btn-secondary fs-3">Tous les vélos</button></a>
        <a href="<?=URL?>bikes/create_bike"><button class="btn btn-secondary fs-3">Les neufs</button></a>
        <a href="<?=URL?>bikes/create_bike"><button class="btn btn-secondary fs-3">Les occaz'</button></a>
    </div>
    <!-- <?=Tools::showArray($allBikes)?> -->

    <div class="d-flex flex-row flex-wrap gap-2 w-100">

        <?php foreach ($allBikes as $bike) : ?>
        <div class="card mx-auto" style="width: 18rem;">
            <img src="<?=URL?>public/assets/images/bikes/<?=$bike['bike_picture']?>" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title"><?=$bike['bike_brand']?> <?=$bike['bike_model']?></h5>
                <?php if($bike['bike_promo'] == 0) : ?>
                <h5 class="card-title"><?=$bike['bike_price']?> €</h5>
                <?php elseif($bike['bike_promo'] == 1) : ?>
                <h5 class="card-title"><span><s><?=$bike['bike_price']?> €</s></span> /
                    <?=$bike['bike_price_promo']?>€</h5>
                <?php endif; ?>
                <?php if($bike['bike_visibility'] == 0) : ?>
                <h5 class="text-danger">Vélo hors ligne</h5>
                <?php elseif($bike['bike_visibility'] == 1) : ?>
                <h5 class="text-success">Vélo en ligne</h5>
                <?php endif?>
                <a href="#" class="btn btn-primary">Voir le vélo</a>
                <a href="#" class="btn btn-danger my-2">Supprimer le vélo</a>

            </div>
        </div>
        <?php endforeach; ?>

    </div>




</div>