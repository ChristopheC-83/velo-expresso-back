<h1 class="text-center my-4"><u>Gestion des vélos</u></h1>
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-2">
    <!-- <a href="<?=URL?>admin/bikes/create_bike"><button class="btn btn-secondary fs-3">Créer un Vélo</button></a>
    <div class="d-flex flexMid gap-2">
        <a href="<?=URL?>admin/bikes/bikes_page"><button class="btn btn-secondary fs-3">Tous les vélos</button></a>
        <a href="<?=URL?>admin/bikes/new_bikes_page"><button class="btn btn-secondary fs-3">Les neufs</button></a>
        <a href="<?=URL?>admin/bikes/used_bikes_page"><button class="btn btn-secondary fs-3">Les occaz'</button></a>
    </div> -->

    <div class="d-flex flex-row flex-wrap gap-2 w-100">

        <?php foreach ($allBikes as $bike) : ?>
        <?php if ($bike['bike_new']==="used") : ?>
        <div class="card mx-auto" style="width: 18rem;">
            <img src="<?=URL?>public/assets/images/bikes/<?=$bike['bike_picture']?>" class="card-img-top"
                alt="<?=$bike['bike_model']?>">
            <div class="card-body d-flex flex-column justify-content-between">
            <?= $bike['bike_new'] ?>
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
                <?php if($bike['bike_sold'] == 1) : ?>
                <h5 class="text-danger">Vélo vendu</h5>
                <?php elseif($bike['bike_sold'] == 0) : ?>
                <h5 class="text-success">Vélo à la vente</h5>
                <?php endif?>
                <a href="<?=URL?>admin/bikes/one_bike/<?=$bike['bike_id']?>" class="btn btn-primary">Détail & Modif</a>
                <form action="<?=URL?>admin/bikes/delete_bike" method="POST"
                    onSubmit="return confirm('On confirme la suppression ?')">
                    <input type="hidden" name="id_to_delete" value=<?= $bike['bike_id']  ?>>
                    <button type="submit" class="btn btn-danger my-2 w-100">Supprimer le vélo</button>
                </form>

            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>

    </div>




</div>