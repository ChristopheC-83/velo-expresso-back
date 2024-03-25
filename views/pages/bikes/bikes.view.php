<h1 class="text-center my-4"><u>Gestion des vélos</u></h1>
<!-- <?=Tools::showArray($allFeatures)?>
<?=Tools::showArray($allDatasFeatures)?> -->
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-2">
    <a href="<?=URL?>admin/bikes/create_bike"><button class="btn btn-secondary fs-3">Créer un Vélo</button></a>
    <div class="d-flex flexMid gap-2">
        <a href="<?=URL?>bikes/create_bike"><button class="btn btn-secondary fs-3">Tous les vélos</button></a>
        <a href="<?=URL?>bikes/create_bike"><button class="btn btn-secondary fs-3">Les neufs</button></a>
        <a href="<?=URL?>bikes/create_bike"><button class="btn btn-secondary fs-3">Les occaz'</button></a>
    </div>
</div>