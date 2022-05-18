    <nav class="navbar navigation navbar-expand-lg navbar-dark ">

        <img class="img-responsive ms-3 me-3 bg-white" style="border-radius: 15px;padding: 3px;width:30px" src="public/images/baguettes.png" alt="couverts baguettes">
        <a class="navbar-brand ml-2 lien" href="./?path=main&action=home">Oishikatta</a>

        <div class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </div>

        </button>
        <button id="theme" class="btn btn-danger">Thème Jour</button>

        <div class="collapse navbar-collapse mx-2" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <?php
                if (!isset($_SESSION["email"])) :
                ?>

                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-danger" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="?path=admin&action=dashboard">Gérer les administrateurs</a>
                                <a class="dropdown-item" href="?path=horairesouverture&action=dashboard">Gérer les horaires d'ouverture</a>
                                <a class="dropdown-item" href="?path=kimono&action=dashboard">Gérer les kimonos</a>
                                <a class="dropdown-item" href="?path=plat&action=dashboard">Gérer les plats</a>
                                <a class="dropdown-item" href="?path=reservation&action=dashboard">Gérer les réservations</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?path=admin&action=logout">Se deconnecter</a>
                    </li>
                    <?php if (isset($_SESSION['email'])) : ?>
                        <div class="nav-link">Bonjour <?= ucfirst($_SESSION["nom"]) ?> ( <?= $_SESSION['role'] ?> )</div>
                    <?php endif; ?>
                <?php endif;

                ?>
                <li class="nav-item">
                    <a class="nav-link lien" href="./?path=categorie&action=menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lien" href="./?path=main&action=concept">Concept</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lien" href="./?path=kimono&action=kimono">Kimono</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lien" href="./?path=horairesouverture&action=info">Informations pratiques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lien" href="./?path=main&action=contact">Nous contacter</a>
                </li>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">Réserver</button>
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Formulaire de réservation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="./?path=reservation&action=traitementReservation" method="post">
                                    <div class="mb-3">
                                        <label for="">Nombre de personnes (1 à 6):</label>

                                        <input type="number" name="nombre" min="1" max="6" required class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required">Nom</label>
                                        <input type="text" name="nom" class="form-control" required class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label required">Email</label>
                                        <input type="email" name="email" class="form-control" required class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Choisir le jour:</label>

                                        <input type="date" name="jour" min="2022-04-06" required class="form-control">

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
                                        <input type="tel" name="tel" placeholder="0612354201" pattern="[0-9]{10}" required><br><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                        <button type="submit" class="btn btn-danger " data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </ul>
        </div>

    </nav>