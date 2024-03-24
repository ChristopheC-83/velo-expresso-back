<h1 class="text-center my-4"><u>Toutes les locations</u></h1>
<div class="w-full py-5">

    <div class="container d-flex flex-column w-full">
        <div class="d-flex w-full border border-2 border-black bg-info">
            <div class="d-flex col-5 justify-content-start border-end border-black py-2">Article</div>
            <div class="d-flex col-1 justify-content-start dir-writing border-end border-black py-2 ">Position</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">1/2 J</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">Journée</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">Jour en +</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">Semaine</div>
            <div class="d-flex col-1 justify-content-center dir-writing border-end border-black py-2">Modifier</div>
            <div class="d-flex col-1 justify-content-center dir-writing py-2">Supp.</div>
        </div>

        <?php foreach ($rentals as $rental) :   ?>

            <div class="d-flex w-full border border-2 border-black ">
                <div class="d-flex col-5  border-end border-black py-2"><?= $rental['item']  ?></div>
                <div class="d-flex col-1 justify-content-center border-end border-black py-2"><?= $rental['position']  ?></div>
                <div class="d-flex col-1 justify-content-center border-end border-black py-2 "><?= $rental['half_day']  ?></div>
                <div class="d-flex col-1 justify-content-center border-end border-black py-2 "><?= $rental['day']  ?></div>
                <div class="d-flex col-1 justify-content-center border-end border-black py-2 "><?= $rental['extra_day']  ?></div>
                <div class="d-flex col-1 justify-content-center border-end border-black py-2 "><?= $rental['week']  ?></div>
                <div class="d-flex col-1 justify-content-center border-end border-black py-2 "><i class="fa-solid fa-pen text-secondary"></i></div>
                <div class="d-flex col-1 justify-content-center py-2 "><i class="fa-solid fa-trash-can  text-danger"></i></div>
            </div>

        <?php endforeach; ?>
    </div>


</div>