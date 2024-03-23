<h1 class="text-center my-4"><u>Atelier</u></h1>
<div class="container">
    <?= Tools::showArray($categories)  ?>

</div>

<div class="container">
    <div class="row">
        <div class=" col-11 col-sm-10 col-lg-8 mx-auto">
            <form action="<?= URL ?>admin/send_new_category" method="POST" class="row">
                <input type="text" class="col-7 text-primary fs-5  rounded" id="new_category" name="new_category" placeholder="Ajout d'une Catégorie">
                <input type="number" class="col-3 text-primary fs-5 rounded" id="new_position" name="new_position" placeholder="sa position">
                <button class="col-1 btn btn-light"><h1>✅</h1></button>
            </form>
        </div>
    </div>
</div>