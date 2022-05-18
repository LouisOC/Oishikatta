<?php

$title = "Réservation enregistrée !";

ob_start(); ?>
<div class="container mt-5">

    <h1>Votre réservation a bien été enregistrée ! A très bientôt !</h1>
</div>
<?php

$content = ob_get_clean();

require("view/template.php");
?>