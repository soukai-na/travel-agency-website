<?php

include_once("DB_conn.php");


class vol
{
    public $id;
    public $depart;
    public $arrivee;
    public $date_vol;
    public $prix;

    public function __construct($id, $depart, $arrivee, $date_vol, $prix)
    {
        $this->id = $id;
        $this->depart = $depart;
        $this->arrivee = $arrivee;
        $this->date_vol = $date_vol;
        $this->prix = $prix;
    }



    public function search($depart, $arrivee, $date_vol)
    {
        $dbh = new PDO('mysql:host=localhost;dbname=projet', "root", "");
        $stmt = $dbh->prepare("SELECT * FROM vol where depart='" . $depart . "' and arrivee='" . $arrivee . "' and date_vol='" . $date_vol . "' ");
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
?><div id="form">
                    <form method="POST" action="reservation.php" style="position:absolute;">
                        <input name="id_vol" type="hidden" value="<?php echo $row['id']; ?>">
                        <input name="pDepart" type="hidden" value="<?php echo $row['depart']; ?>">
                        <input name="pArrivee" type="hidden" value="<?php echo $row['arrivee']; ?>">
                        <input name="dateVol" type="hidden" value="<?php echo $row['date_vol']; ?>">
                        <input name="price" type="hidden" value="<?php echo $row['prix']; ?>">
                        <table>
                            <tr id="first">
                                <td>Pays de départ</td>
                                <td>Pays d'arrivée</td>
                                <td>date de vol</td>
                                <td>Prix</td>
                            </tr>
                            <tr>
                                <td><?php echo $row['depart']; ?></td>
                                <td><?php echo $row['arrivee']; ?></td>
                                <td><?php echo $row['date_vol']; ?></td>
                                <td><?php echo $row['prix']; ?></td>
                            </tr>
                        </table>
                        <input type="submit" value="Réserver" />
                    </form>
                </div>
            <?php

            
        } else { ?>
            <div class="form_search">
                <h1>Aucun vol trouvé</h1>

                <form method="post" action="afficher_vol.php" style="color: #122051;">
                    Pays de depart: <select name="depart" required>
                        <option value="">pays de départ</option>
                        <option value="Algérie">Algérie</option>
                        <option value="Allemagne">Allemagne</option>
                        <option value="Arabie Saoudite">Arabie Saoudite</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Brésil">Brésil</option>
                        <option value="Canada">Canada</option>
                        <option value="Égypte">Égypte</option>
                        <option value="Espagne">Espagne</option>
                        <option value="France">France</option>
                        <option value="Liban">Liban</option>
                        <option value="Maroc">Maroc</option>
                        <option value="Oman">Oman</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Russie">Russie</option>
                        <option value="Tunisie">Tunisie</option>
                        <option value="Turquie">Turquie</option>
                        <option value="Zambie">Zambie</option>
                    </select>
                    Pays d'arrivée: <select name="arrivee" required>
                        <option value="">pays d'arrivée</option>
                        <option value="Algérie">Algérie</option>
                        <option value="Allemagne">Allemagne</option>
                        <option value="Arabie Saoudite">Arabie Saoudite</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Brésil">Brésil</option>
                        <option value="Canada">Canada</option>
                        <option value="Égypte">Égypte</option>
                        <option value="Espagne">Espagne</option>
                        <option value="France">France</option>
                        <option value="Liban">Liban</option>
                        <option value="Maroc">Maroc</option>
                        <option value="Oman">Oman</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Russie">Russie</option>
                        <option value="Tunisie">Tunisie</option>
                        <option value="Turquie">Turquie</option>
                        <option value="Zambie">Zambie</option>
                    </select>
                    Date de voyage: <input type="date" name="date" placeholder="date de voyage" required /></br>
                    <input type="submit" name="submit" value="Search" />
                </form>
            </div>

<?php
        }
    }
}
?>