<?php

$title = "Modifier une réservation";

ob_start(); ?>
<div class="container mt-5">
    <form action="./?path=reservation&action=processUpdate" method="post" class="d-flex justify-content-center">
        <input type="hidden" name="id" value="<?= $reservations->getIdReservation() ?>">

        <section class="my-2">
            <h1 class="text-center mb-5">Formulaire de modification d'une réservation</h1>

            <div class="mb-3">
                <label for="">Nombre de personnes (1 à 6):</label>

                <input type="number" name="nombre" min="1" max="6" required class="form-control" value="<?= $reservations->getNombre() ?>">
            </div>

            <div class="mb-3">
                <label class="form-label required">Nom</label>
                <input type="text" name="nom" class="form-control" required class="form-control" value="<?= $reservations->getNom() ?>">
            </div>

            <div class="mb-3">
                <label class="form-label required">Email</label>
                <input type="email" name="email" class="form-control" required class="form-control" value="<?= $reservations->getEmail() ?>">
            </div>

            <div class="mb-3">
                <label for="">Choisir le jour:</label>

                <input type="date" name="jour" min="2022-04-06" required class="form-control" value="<?= $reservations->getJour() ?>">

            </div>
            <div class="mb-3">
                <label for="">Choisir l'heure:</label>

                <select name="heure" required class="form-control">
                    <option>--Sélectionnez une heure--</option>
                    <option>12h00</option>
                    <option>13h00</option>
                    <option>14h00</option>
                    <option>15h00</option>
                    <option>16h00</option>
                    <option>17h00</option>
                    <option>18h00</option>
                    <option>19h00</option>
                    <option>20h00</option>
                    <option>21h00</option>
                    <option>22h00</option>
                </select>

            </div>
            <div class="mb-3">
                <label for="phone">Entrez un numéro de téléphone:</label>
                <input type="tel" name="tel" placeholder="0612354201" pattern="[0-9]{10}" required value="<?= $reservations->getTel() ?>">
            </div>



            <div class="d-flex justify-content-center my-5">
                <button class="btn btn-info">Envoyer</button>
            </div>
        </section>
    </form>


</div>
<?php

$content = ob_get_clean();

require("view/template.php");
?>