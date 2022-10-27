<?php


class client
{
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $depart;
    public $arrivee;
    public $datevol;
    public $nb_pers;

    public function __construct($id, $nom, $prenom, $email, $depart, $arrivee, $datevol, $nb_pers)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->depart = $depart;
        $this->arrivee = $arrivee;
        $this->datevol = $datevol;
        $this->nb_pers = $nb_pers;
    }

    public function insert()
    {

        $dbh = new PDO('mysql:host=localhost;dbname=projet', "root", "");
        $requete = "INSERT INTO client(id,nom,prenom,email,depart,arrivee,date_de_vol,nb_pers) VALUES (NULL , :nom , :prenom , :email , :depart , :arrivee , :date_de_vol , :nb_pers)";

        $stmt = $dbh->prepare($requete);
        $valid = $stmt->execute(array(
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'depart' => $_POST['pays_depart'],
            'arrivee' => $_POST['pays_arrivee'],
            'date_de_vol' => $_POST['date_vol'],
            'nb_pers' => $_POST['pers']
        ));
        if ($valid) { ?>
            <div class="insert" style="width:600px;">
                <h5>Données insérées</h5>
            </div>
            <a href='index.php'><button> accéder à l'accueil </button></a>

        <?php
        } else {
            echo "Échec de l'opération d'insertion";
        }
    }
    public function afficher($email)
    {
        $dbh = new PDO('mysql:host=localhost;dbname=projet', "root", "");
        $stmt = $dbh->prepare("SELECT * FROM client where email = '" . $email . "'");
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
        ?>
            <div class="info">
               <b> Nom:  </b>      <?php echo $row['nom']; ?><br>
               <b> Prénom:  </b>   <?php echo $row['prenom']; ?></br>
               <b> Email:   </b>      <?php echo $row['email']; ?></br>
                <b>Pays de départ:  </b>     <?php echo $row['depart']; ?></br>
               <b> Pays d'arrivée: </b>     <?php echo $row['arrivee']; ?></br>
               <b> Date de vol:  </b>      <?php echo $row['date_de_vol']; ?></br>
               <b> Nombre de personne: </b>    <?php echo $row['nb_pers']; ?></br>
        </br>
                <form method="post" action="update.php">
                    <input type="hidden" value="<?php echo $row['nom']; ?>" name="nom" />
                    <input type="hidden" value="<?php echo $row['prenom']; ?>" name="prenom" />
                    <input type="hidden" value="<?php echo $row['email']; ?>" name="mail" />
                    <input type="hidden" value="<?php echo $row['depart']; ?>" name="depart" />
                    <input type="hidden" value="<?php echo $row['arrivee']; ?>" name="arrivee" />
                    <input type="hidden" value="<?php echo $row['date_de_vol']; ?>" name="date_de_vol" />
                    <input type="hidden" value="<?php echo $row['nb_pers']; ?>" name="pers" />
                    <input type="submit" name="update" value="update" />
                </form>
                <form method="post" action="delete.php">
                    <input type="hidden" value="<?php echo $row['nom']; ?>" name="nom" />
                    <input type="hidden" value="<?php echo $row['prenom']; ?>" name="prenom" />
                    <input type="hidden" value="<?php echo $row['email']; ?>" name="mail" />
                    <input type="hidden" value="<?php echo $row['depart']; ?>" name="depart" />
                    <input type="hidden" value="<?php echo $row['arrivee']; ?>" name="arrivee" />
                    <input type="hidden" value="<?php echo $row['date_de_vol']; ?>" name="date_de_vol" />
                    <input type="hidden" value="<?php echo $row['nb_pers']; ?>" name="pers" />
                    <input type="submit" name="delete" value="delete" />
                </form>
            </div>
        <?php
        } else {
        ?>
            <div class="insert" style="width:600px;">
                <h5>vous n'avez aucun vol!</h5>
            </div>
            <a href='index.php'><button> accéder à l'accueil </button></a>
            <?php
        }
    }
    public function update()
    {
        if ($_POST['modifier']) {


            $dbh = new PDO('mysql:host=localhost;dbname=projet', "root", "");
            $sql = "UPDATE client SET  nom=:nom, prenom=:prenom, email=:email, depart=:depart, arrivee=:arrivee , date_de_vol=:date_de_vol , nb_pers=:nb_pers WHERE email='" . $_POST['email'] . "'";
            $stmt = $dbh->prepare($sql);
            $modif = $stmt->execute(array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'depart' => $_POST['pays_depart'],
                'arrivee' => $_POST['pays_arrivee'],
                'date_de_vol' => $_POST['date_vol'],
                'nb_pers' => $_POST['pers']
            ));
            if ($modif) {  ?>
            <div class="insert" style="width:600px;">
                <h5>updated</h5>
            </div>
            <a href="index.php"><button>Accéder à l'accueil</button></a>

<?php
            } else {
                echo 'updated errrrrrrroooooorrr!!';
            }
        }
    }
    public function delete()
    {
        if ($_POST['delete']) {
            $dbh = new PDO('mysql:host=localhost;dbname=projet', "root", "");
            $sql = "DELETE FROM client WHERE email='" . $_POST['mail'] . "'";
            $dbh->exec($sql);
            ?>
             <div class="insert" style="width:600px;">
            <h5>Votre réservation est annulé!</h5>
             </div>
            <a href="index.php"><button>Accéder à l'accueil</button></a>
            <?php
        }
    }
}
