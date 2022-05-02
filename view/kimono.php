<?php $title = "Kimono" ?>

<?php ob_start(); ?>

<h1 class="py-5 bg-danger titre">Kimono</h1>

<p class="py-5"> Nous mettons également à votre disposition de nombreux kimonos.
    n’hesitez pas à demander à notre personnel pour l’essayage </p>


<div class="container-fluid">

    <div class="row">
        <?php
        foreach ($kimonos as $unkimono) {
        ?>
            <div class="col-lg-4 col-md-12">
                <img class="img-fluid ni" src="public/kimonos/<?= $unkimono->getImageKimono() ?>" alt="">
            </div>
        <?php } ?>
    </div>
</div>





<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>