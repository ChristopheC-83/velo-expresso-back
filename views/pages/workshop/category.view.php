<h1 class="text-center my-4"><u>Gestion de : <span class="text-capitalize"><?= $category['name'] ?></span></u></h1>

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
        <?php if (empty($_POST['id']) || $_POST['id'] != $task['id']) : ?>
            <div class="row w-100 border p-2">
                <div class="col-4 text-capitalize"><?= $task['name'] ?></div>
                <div class="col-2 text-center"><?= $task['position'] ?></div>
                <div class="col-2 text-center"><?= $task['task_price'] ?></div>
                <div class="col-2 text-center text-secondary">
                    <form method="POST" action="">
                        <input type="hidden" name="id" value=<?= $task['id'] ?>>
                        <button class="btn" type="submit"><i class="fa-solid fa-pen text-secondary"></i></button>
                    </form>
                </div>
                <div class="col-2 text-center">
                    <form action="<?= URL ?>admin/workshop/delete_task" method="POST" onSubmit="return confirm('On confirme la suppression ?')">
                        <input type="hidden" name="task_category" value=<?= $task['task_category'] ?>>
                        <input type="hidden" name="id" value=<?= $task['id'] ?>>
                        <button class="btn" type="submit"><i class="fa-solid fa-trash-can  text-danger"></i></button>
                    </form>
                </div>
            </div>
            <?php else :  ?> 
            <form method="POST" action="<?= URL ?>admin/workshop/modify_task">
                <div class="row w-100 border p-2">
                    <input type="hidden" name="task_category" value=<?= $task['task_category'] ?>>
                    <input type="hidden" name="id" value=<?= $task['id'] ?>>
                    <div class="col-4">
                        <input type="text" value="<?= $task['name'] ?>" name="name">
                    </div>
                    <div class="col-2 text-center">
                        <input type="number" name="position" value="<?= $task['position']?>">
                    </div>
                    <div class="col-2 text-center">
                        <input type="number" name="task_price" value="<?= $task['task_price'] ?>">
                    </div>
                    <div class="col-4 text-center text-secondary">
                        <button class="btn btn-warning" type="submit">valider la modification</button>
                    </div>
                </div>
            </form>
            <?php endif ?>
        <?php endforeach; ?>
</div>

<!-- ajout d'une tache dans la catégorie choisie -->
<div class="container mt-5">
    <div class="row">
        <div class=" col-11 col-sm-10 col-lg-8 mx-auto ">
            <form action="<?= URL ?>admin/workshop/send_new_task" method="POST" class="row ">
                <input type="hidden" name="task_category" value="<?= $category['name'] ?>">


                <input type="text" class="col-5 text-primary fs-5  rounded" id="name" name="name" placeholder="Ajout d'une Tache">


                <input type="number" class="col-2 text-primary fs-5 rounded mx-3" id="position" name="position" placeholder="sa position">

                <input type="number" class="col-2 text-primary fs-5 rounded" id="task_price" name="task_price" placeholder="son prix">

                <button class="col-1 btn btn-light">
                    <h1>✅</h1>
                </button>
            </form>
        </div>
    </div>
</div>