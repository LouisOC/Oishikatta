<?php $title = "Nous contacter" ?>

<?php ob_start(); ?>


<h1 class="py-5 titre bg-danger">Formulaire de contact</h1>

<form action="" class="my-3" method="post">
    <div class="row col-8 mx-auto">
        <div class="col-3">
            <label for="">Nom</label>
        </div>
        <div class="col-9">
            <input type="text" name="nom" required class="form-control">
        </div>
    </div>
    <div class="row col-8 mx-auto my-3">
        <div class="col-3">
            <label for="">Email</label>
        </div>
        <div class="col-9">
            <input type="email" name="email" required class="form-control">
        </div>
    </div>
    <div class="row col-8 mx-auto my-3">
        <div class="col-3">
            <label for="">Sujet</label>
        </div>
        <div class="col-9">
            <input type="text" name="sujet" required minlength="6" class="form-control">
        </div>
    </div>
    <div class="row col-8 mx-auto my-3">
        <label for="">Message</label> <br>
        <textarea name="message" class="form-control " id="" cols="30" rows="10"></textarea>
    </div>
    <div class="row col-8 mx-auto">
        <button class="btn btn-danger col-5 my-2 mx-auto">Envoyer</button>
    </div>
</form>

<?php
//Si le formulaire a été soumis,
if (isset($_POST["message"])) {
    $message = "Ce message vous a été envoyé via la page contact du site Oishikatta
        Nom : " . $_POST["nom"] . "
        Email : " . $_POST["email"] . "
        Message :" . $_POST["message"];
    //mail() est une fonction d'envoi de mail
    $retour = mail("tran.louis27@gmail.com", $_POST["sujet"], $message, "From:localhost@exempleprojet.fr\r\nReply-to:" . $_POST["email"]);
    if ($retour) {
        echo "L'email a bien été envoyé. Nous vous recontacterons sous 2 jours ouvrés maximum.";
    }
}
?>


<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>