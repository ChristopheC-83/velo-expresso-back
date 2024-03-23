<h1 class="text-center my-4"><u>Gestion de : <?= $category['cat_name'] ?></u></h1>

<div class="container">
    <!-- <?= Tools::showArray($category)  ?>
    <?= Tools::showArray($tasks)  ?> -->
    <div class="row w-100 border p-3 fw-bold">
        <div class="col-4">Taches</div>
        <div class="col-2 text-center">Position</div>
        <div class="col-2 text-center">Prix</div>
        <div class="col-2 text-center">Modifier</div>
        <div class="col-2 text-center">Supp.</div>
    </div>
    <?php foreach ($tasks as $task) : ?>
        <!-- <?php if (empty($_POST['id']) || $_POST['id'] != $task['task_id']) : ?> -->
            <div class="row w-100 border p-2">
                <div class="col-4 text-capitalize"><?= $task['task_name'] ?></div>
                <div class="col-2 text-center"><?= $task['task_position'] ?></div>
                <div class="col-2 text-center"><?= $task['task_price'] ?></div>
                <div class="col-2 text-center text-secondary">
                    <form method="POST" action="">
                        <input type="hidden" name="id" value=<?= $task['task_id'] ?>>
                        <button class="btn" type="submit"><i class="fa-solid fa-pen text-secondary"></i></button>
                    </form>
                </div>
                <div class="col-2 text-center">
                    <form action="<?= URL ?>admin/delete_task" method="POST" onSubmit="return confirm('On confirme la suppression ?')">
                        <input type="hidden" name="id" value=<?= $task['task_id'] ?>>
                        <button class="btn" type="submit"><i class="fa-solid fa-trash-can  text-danger"></i></button>
                    </form>
                </div>
            </div>
            <!-- <?php else :  ?>  -->
            <!-- <form method="POST" action="<?= URL ?>admin/modify_category">
                <div class="row w-100 border p-2">
                    <div class="col-5">
                        <input type="text" value="<?= $category['cat_name'] ?>" name="new_cat_name">
                    </div>
                    <div class="col-3 text-center">
                        <input type="number" name="new_cat_position" value="<?= $category['cat_position'] ?>">
                    </div>
                    <div class="col-4 text-center text-secondary">
                        <input type="hidden" name="id" value=<?= $category['cat_id'] ?>>
                        <button class="btn btn-warning" type="submit">valider la modification</button>
                    </div>
                </div>
            </form> -->
            <!-- <?php endif ?> -->
        <?php endforeach; ?>

</div>

<!-- ajout d'une tache dans la catégorie choisie -->
<div class="container mt-5">
    <div class="row">
        <div class=" col-11 col-sm-10 col-lg-8 mx-auto">
            <form action="<?= URL ?>admin/send_new_task" method="POST" class="row">
                <input type="hidden" name="task_category" value="<?= $category['cat_name'] ?>">


                <input type="text" class="col-5 text-primary fs-5  rounded" id="task_name" name="task_name" placeholder="Ajout d'une Tache">


                <input type="number" class="col-3 text-primary fs-5 rounded" id="task_position" name="task_position" placeholder="sa position">

                <input type="number" class="col-3 text-primary fs-5 rounded" id="task_price	" name="task_price" placeholder="son prix">

                <button class="col-1 btn btn-light">
                    <h1>✅</h1>
                </button>
            </form>
        </div>
    </div>
</div>