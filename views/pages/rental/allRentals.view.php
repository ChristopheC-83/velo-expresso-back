<h1 class="text-center my-4"><u>Toutes les locations</u></h1>
<?php if(!empty($_POST['id']))  { echo( $_POST['id']);} ?>
<div class="w-full py-5">

    <div class="container d-flex flex-column w-full">
        <div class="d-flex w-full border border-2 border-black bg-info">
            <div class="d-flex col-5 justify-content-start border-end border-black py-2 ps-2">Article</div>
            <div class="d-flex col-1 justify-content-start dir-writing border-end border-black py-2 ">Position</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">1/2 J</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">Journée</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">Jour en +</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">Semaine</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">Modifier</div>
            <div class="d-flex col-1 justify-content-center dir-writing py-2">Supp.</div>
        </div>

        <?php foreach ($rentals as $rental) :   ?>

        <?php if (!empty($_POST['id']) && $_POST['id']==$rental['id']):?>
        <form action="<?= URL ?>admin/rental/send_update_rental" method="POST">
            <div class="d-flex w-full border border-2 border-black text-primary">
                <input type="hidden" value="<?=$rental['id']?>" name="id">
                <input type="text" value='<?= $rental['name']  ?>' name="name" class="col-5  text-primary ">
                <input type="number" value='<?= $rental['position']  ?>' name="position"
                    class="col-1 text-center text-primary">
                <input type="number" value='<?= $rental['half_day']  ?>' name="half_day"
                    class="col-1 text-center text-primary">
                <input type="number" value='<?= $rental['day']  ?>' name="day" class="col-1 text-center text-primary">
                <input type="number" value='<?= $rental['extra_day']  ?>' name="extra_day"
                    class="col-1 text-center text-primary">
                <input type="number" value='<?= $rental['week']  ?>' name="week" class="col-1 text-center text-primary">
                <div class="d-flex col-2 justify-content-center border-end border-black py-2 ">
                    <button type="submit" class="btn btn-warning">Valider</button>
                </div>
            </div>
        </form>

        <?php else : ?>

        <div class="d-flex w-full border border-2 border-black ">
            <div class="d-flex col-5  border-end border-black py-2 ps-2"><?= $rental['name']  ?></div>
            <div class="d-flex col-1 justify-content-center border-end border-black py-2"><?= $rental['position']  ?>
            </div>
            <div class="d-flex col-1 justify-content-center border-end border-black py-2 "><?= $rental['half_day']  ?>
            </div>
            <div class="d-flex col-1 justify-content-center border-end border-black py-2 "><?= $rental['day']  ?></div>
            <div class="d-flex col-1 justify-content-center border-end border-black py-2 "><?= $rental['extra_day']  ?>
            </div>
            <div class="d-flex col-1 justify-content-center border-end border-black py-2 "><?= $rental['week']  ?></div>
            <div class="d-flex col-1 justify-content-center border-end border-black py-2 ">
                <!-- <a href="<?= URL ?>admin/rental/modify_rental/<?= $rental['id']  ?>"><i
                        class="fa-solid fa-pen text-secondary"></i></a> -->
                <form action="" method="POST">
                    <input type="hidden" value="<?=$rental['id']?>" name="id">
                    <button type="submit"><i class="fa-solid fa-pen text-secondary"></i></button>
                </form>
            </div>
            <div class="d-flex col-1 justify-content-center py-2 ">
                <form action="<?= URL ?>admin/rental/delete_rental" method="POST"
                    onSubmit="return confirm('On confirme la suppression ?')">
                    <input type="hidden" name="id" value=<?= $rental['id'] ?>>
                    <button class="btn" type="submit"><i class="fa-solid fa-trash-can  text-danger"></i></button>
                </form>

            </div>
        </div>
        <?php endif ?>
        <?php endforeach; ?>
    </div>








    <h2 class="text-center mt-4 mb-2 p-0">Ajout d'une location</h2>
    <!-- ajout d'une location  -->
    <div class="container mt-5">
        <div class="row">
            <div class=" col-11 col-sm-10 col-lg-8 mx-auto">
                <form action="<?= URL ?>admin/rental/send_new_rental" method="POST" class="d-flex flex-column ">


                    <input type="text" class="text-primary fs-5 rounded mb-3 p-1" id="name" name="name"
                        placeholder="Ajout d'un article à louer">
                    <input type="number" class="text-primary fs-5 rounded mb-3 p-1" id="position" name="position"
                        placeholder="position dans le tableau">
                    <input type="number" class="text-primary fs-5 rounded mb-3 p-1" id="half-day" name="half-day"
                        placeholder="tarif demi-journée">
                    <input type="number" class="text-primary fs-5 rounded mb-3 p-1" id="day" name="day"
                        placeholder="tarif journée">
                    <input type="number" class="text-primary fs-5 rounded mb-3 p-1" id="extra-day" name="extra-day"
                        placeholder="tarif journée-supp">
                    <input type="number" class="text-primary fs-5 rounded mb-3 p-1" id="week" name="week"
                        placeholder="tarif semaine">

                    <button class="col-12 btn btn-primary">
                        <h3>Valider l'ajout</h3>
                    </button>
                </form>
            </div>
        </div>
    </div>


</div>