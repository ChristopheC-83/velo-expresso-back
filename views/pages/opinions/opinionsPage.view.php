<h1 class="text-center my-4"><u>Gestion des avis à valider</u></h1>
<h3 class="text-center ">Ici les avis non validés</h3>
<h3 class="text-center ">Non affichés sur le site</h3>

<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-4">
    <!-- <?=Tools::showArray($allOpinions)?> -->

    <?php foreach ($allOpinions as $opinion) : ?>
    <?php if($opinion['validated'] === 0) : ?>
    <div class="d-flex flex-column bg-white border border-2 border-black rounded p-3" style="width:290px">
            <div class="d-flex flex-column w-100">
                <div class="w-100 d-flex justify-content-between">
                    <h5><?=$opinion['name'] ?></h5>
                    <p class="text-secondary"><?=date("d/m/Y", strtotime($opinion['createdAt'] )) ?></p>
                </div>
                <div class="rounded mb-3"><?=$opinion['message'] ?></div>
            </div>
            <form action="<?=URL?>admin/opinions/add_opinion/" method="post">
            <div class="w-100 h-100 ">
                <textarea name="response" id="response" class="w-100 p-2" rows="8" placeholder="Réponse de Vélo Expresso"></textarea>
            </div>

                <input type="hidden" value="<?=$opinion['id']?>" name="id">
                <button class="btn btn-success w-100 my-3">Valider</button>
            </form>
            <form action="<?=URL?>admin/opinions/delete_opinion/" method="post"
                onSubmit="return confirm('On confirme la suppression ?')">
                <input type="hidden" value="<?=$opinion['id']?>" name="id">
                <button class="btn btn-danger w-100">Supprimer l'avis</button>
            </form>

    </div>

    <?php endif ?>
    <?php endforeach?>
    <a href="<?= URL ?>admin/opinions/validated_opinions_page" class="btn btn-primary fs-2" style="width:290px">Les avis validés ➡️</a>
    

</div>