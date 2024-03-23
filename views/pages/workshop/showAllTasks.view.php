<h1 class="text-center my-4"><u>L'atelier / Toutes les taches</u></h1>

<div class="container">
    <div class="d-flex flex-column my-4">
        <?php foreach ($categories as $category) : ?>

            <div class="d-flex flex-column my-4 border border-black border-3">

                <div class="border">
                    <h2 class="text-uppercase bg-secondary p-0 m-0"><?= $category['cat_name'] ?></h2>
                </div>
                <?php foreach ($tasks as $task) : ?>
                    <?php if ($task['task_category'] == $category['cat_name']) : ?>
                        <div class="d-flex align-items-center justify-content-between border">
                            <p class="p-2 m-0 " ><?= $task['task_name'] ?></p>
                            <p class="p-2 m-0 " ><?= $task['task_price'] ?> €</p>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

    </div>