<h1 class="text-center my-4"><u>Ajout d'une Location</u></h1>
<div class="container">



    <!-- ajout d'une location  -->
    <div class="container mt-5">
        <div class="row">
            <div class=" col-11 col-sm-10 col-lg-8 mx-auto">
                <form action="<?= URL ?>admin/rental/send_new_rental" method="POST" class="d-flex flex-column " enctype="multipart/form-data">


                    <input type="text" class="text-primary fs-5 rounded mb-3" id="item" name="item" placeholder="Ajout d'un article à louer">
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="position" name="position" placeholder="position dans le tableau">
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="half-day" name="half-day" placeholder="tarif demi-journée">
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="day" name="day" placeholder="tarif journée">
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="extra-day" name="extra-day" placeholder="tarif journée-supp">
                    <input type="number" class="text-primary fs-5 rounded mb-3" id="week" name="week" placeholder="tarif semaine">

                    <button class="col-12 btn btn-primary">
                        <h3>Valider l'ajout</h3>
                    </button>
                </form>
            </div>
        </div>
    </div>






</div>