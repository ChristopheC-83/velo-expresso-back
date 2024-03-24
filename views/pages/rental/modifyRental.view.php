<h1 class="text-center my-4"><u>Modifier une Location</u></h1>
<h2 class="text-center my-4"><?= $rentalToUpdate['item'] ?></h2>
<div class="container">

    <!-- <?= Tools::showArray($rentalToUpdate) ?> -->
    <!-- modification d'une location  -->
    <div class="container mt-5">
        <div class="row">
            <div class=" col-11 col-sm-10 col-lg-8 mx-auto">
                <form action="<?= URL ?>admin/rental/send_update_rental" method="POST" class="d-flex flex-column" enctype="multipart/form-data">

                    <input type="hidden" name="id" value=<?= $rentalToUpdate['rental_id'] ?>>

                    <label for="item" class="py-2 mt-1">Article à modifier</label>
                    <input type="text" class="text-primary fs-5 rounded mb-3" id="item" name="item" value="<?= $rentalToUpdate['item'] ?>">

                    <label for="position" class="py-2 mt-1">Position</label>
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="position" name="position" value=<?= $rentalToUpdate['position'] ?>>

                    <label for="half-day" class="py-2 mt-1">Tarif demi-journée</label>
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="half-day" name="half_day" value=<?= $rentalToUpdate['half_day'] ?>>

                    <label for="day" class="py-2 mt-1">Tarif journée</label>
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="day" name="day" value=<?= $rentalToUpdate['day'] ?>>

                    <label for="extra-day" class="py-2 mt-1">Tarif 1 jour supplémentaire</label>
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="extra-day" name="extra_day" value=<?= $rentalToUpdate['extra_day'] ?>>

                    <label for="week" class="py-2 mt-1">Tarif semaine</label>
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="week" name="week" value=<?= $rentalToUpdate['week'] ?>>

                    <button class="col-12 btn btn-light">
                        <h1>Valider la Mise A Jour</h1>
                    </button>
                </form>
            </div>
        </div>
    </div>