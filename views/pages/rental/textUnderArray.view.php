<h1 class="text-center my-4"><u>Texte sous le tableau</u></h1>
<div class="container">

    <div class="container mt-5">
        <div class="col-12 col-lg-10 col-xl-8  mx-auto  my-5 rounded-3 box-shadow-white px-3 fs-5">
            <form action="<?= URL ?>admin/rental/send_text_under_rental" method="post">
                <textarea name="text_under_rental" id="default" cols="30" rows="10"><?=$text  ?></textarea>
                <button type="submit" class="btn btn-light w-100 py-3 mt-3 fs-5">
                    Validation du texte
                </button>
            </form>
        </div>
    </div>
</div>