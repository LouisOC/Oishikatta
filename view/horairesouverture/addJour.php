<?php

$title = "Ajouter un jour";

ob_start(); ?>
<div class="container mt-5">
    <form action="./?path=horairesouverture&action=traitementAjout" method="post" class="d-flex justify-content-center">
        <section class="my-2">
            <h1 class="text-center mb-5">Formulaire d'ajout</h1>

            <div class="mb-3">
                <label for="">Choisir le jour:</label>

                <select name="jour" required class="form-control">
                    <option>--Sélectionnez un jour--</option>
                    <option>Lundi</option>
                    <option>Mardi</option>
                    <option>Mercredi</option>
                    <option>Jeudi</option>
                    <option>Vendredi</option>
                    <option>Samedi</option>
                    <option>Dimanche</option>
                </select>

            </div>
            <hr>
            <div class="mb-3">
                <label for="">Choisir l'heure d'ouverture:</label>

                <select name="heureOuverture" required class="form-control">
                    <option>--Sélectionnez une heure d'ouverture--</option>
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
                    <option>23h00</option>
                    <option>00h00</option>
                    <option>01h00</option>
                    <option>02h00</option>
                </select>

            </div>
            <hr>

            <div class="mb-3">
                <label for="">Choisir l'heure de fermeture:</label>

                <select name="heureFermeture" required class="form-control">
                    <option>--Sélectionnez une heure de fermeture--</option>
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
                    <option>23h00</option>
                    <option>00h00</option>
                    <option>01h00</option>
                    <option>02h00</option>
                </select>

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