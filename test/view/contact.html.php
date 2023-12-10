
<?php
var_dump($categories);

  
//   ?>
                

    <div class="container">
        <h1>Carnet de contact</h1>
        filtrer par : <select name="" id="">
            <option value="">nom</option>
            <option value="">prenom</option>
            <option value="">categorie</option>
            <h1>Liste des contacts</h1>
        </select><br><br>
        <table border="1">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Categorie</th>
            </tr>
            <?php foreach ($contacts as $key): ?>
                <?php ;?>

            <tr class="open"  >
                <td>
                <?= $key['nom'];?>
                </td>
                <td>
                <?= $key['prenom'];?>
                </td>
                <td>
                <?= $key['categorie'];?>
                </td>
            </tr>
          
            <?php endforeach; ?>
        </table>
        <div>
            <button class="ajout">Ajouter un contact</button>
        </div>

        <!--modal infos contact -->
        <div class="modal-infos">
            <div class="modal-content form">
                <h3 class="title">TITRE</h3>
                <?php foreach ($contacts as $key): ?>
                <p>
                    nom :  <?= $key['nom'];?>
                </p>
                <p>
                    prenom :  <?= $key['prenom'];?>
                </p>
                <p>
                    Categorie :  <?= $key['categorie'];?>
                </p>
                <?php endforeach; ?>
                <div>
                    <button>Modifier</button>
                    <button class="close">Fermer</button>
                </div>

            </div>

        </div>

        <!-- modal ajout contact -->
        <div class="modal-ajout">
            <div class="modal-content form">
                <h3 class="title">Ajout Contact</h3>

                <form action="">
                    <div>
                        <label for="">Nom</label>
                        <input class="nom" type="text" name="nom">
                    </div><br>
                    <div>
                        <label for="">Prenom</label>
                        <input class="prenom" type="text" name="prenom">
                    </div><br>
                    <div>
                        <label for="">Categorie</label>
                        <select class="categorie" name="categorie" id="">
                            <option value="">selectionner</option>
                            <?php foreach ($categories as $key): ?>
                            <option value="<?= $key['id']?>"><?= $key['libelle']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><br>
                    <button id="submit" name="submit"  >Enregistrer</button>
                    <button class="closeAjout" >Annuler</button>
                </form>
            </div>
        </div>
    </div>
    <script src="/script.js"></script>
</div>

