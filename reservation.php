<html>

<head>
    <title>SRS pour voyage</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
</body>
<?php
include_once("class/DB_conn.php");
include_once("class/class_vol.php");

$id_vol = $_POST['id_vol'];
$pDepart = $_POST['pDepart'];
$pArrivee = $_POST['pArrivee'];
$dateVol = $_POST['dateVol'];
$price = $_POST['price'];


?>

<header>
      <ul>
         <li><a href="index.php">Accueil</a></li>
         <li><a href="contact.php">Contact</a></li>
      </ul>
   </header>
<form method="post" action="validation.php">
    <input name="id_vol" type="hidden" value="<?php echo $id_vol; ?>">
    Nom:<input type="text" name="nom" style="margin-left:176px;" required /><br>
    Prénom:<input type="text" name="prenom" style="margin-left:144px;" required /><br>
    Email:<input type="text" name="email" style="margin-left:161px;" required /><br>
    <input name="paysdepart" type="hidden" value="<?php echo $pDepart; ?>" />
    Pays de départ:<select name="pays_depart" value='<?php echo $pDepart; ?>' style="margin-left:83px;" required>
        <option value="">--pays de départ--</option>
        <option value="Algérie" <?php if ('Algérie' == $pDepart) {
                                    echo 'selected';
                                } ?>>Algérie</option>
        <option value="Allemagne" <?php if ('Allemagne' == $pDepart) {
                                        echo 'selected';
                                    } ?>>Allemagne</option>
        <option value="Arabie Saoudite" <?php if ('Arabie Saoudite' == $pDepart) {
                                            echo 'selected';
                                        } ?>>Arabie Saoudite</option>
        <option value="Belgique" <?php if ('Belgique' == $pDepart) {
                                        echo 'selected';
                                    } ?>>Belgique</option>
        <option value="Brésil" <?php if ('Brésil' == $pDepart) {
                                    echo 'selected';
                                } ?>>Brésil</option>
        <option value="Canada" <?php if ('Canada' == $pDepart) {
                                    echo 'selected';
                                } ?>>Canada</option>
        <option value="Égypte" <?php if ('Égypte' == $pDepart) {
                                    echo 'selected';
                                } ?>>Égypte</option>
        <option value="Espagne" <?php if ('Espagne' == $pDepart) {
                                    echo 'selected';
                                } ?>>Espagne</option>
        <option value="France" <?php if ('France' == $pDepart) {
                                    echo 'selected';
                                } ?>>France</option>
        <option value="Liban" <?php if ('Liban' == $pDepart) {
                                    echo 'selected';
                                } ?>>Liban</option>
        <option value="Maroc" <?php if ('Maroc' == $pDepart) {
                                    echo 'selected';
                                } ?>>Maroc</option>
        <option value="Oman" <?php if ('Oman' == $pDepart) {
                                    echo 'selected';
                                } ?>>Oman</option>
        <option value="Portugal" <?php if ('Portugal' == $pDepart) {
                                        echo 'selected';
                                    } ?>>Portugal</option>
        <option value="Russie" <?php if ('Russie' == $pDepart) {
                                    echo 'selected';
                                } ?>>Russie</option>
        <option value="Tunisie" <?php if ('Tunisie' == $pDepart) {
                                    echo 'selected';
                                } ?>>Tunisie</option>
        <option value="Turquie" <?php if ('Turquie' == $pDepart) {
                                    echo 'selected';
                                } ?>>Turquie</option>
        <option value="Zambie" <?php if ('Zambie' == $pDepart) {
                                    echo 'selected';
                                } ?>>Zambie</option>
    </select><br>
    Pays d'arrivée:<select name="pays_arrivee" value='<?php echo $pArrivee; ?>' style="margin-left:83px;" required>
        <option value="">--pays d'arrivée--</option>
        <option value="Algérie" <?php if ('Algérie' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Algérie</option>
        <option value="Allemagne" <?php if ('Allemagne' == $pArrivee) {
                                        echo 'selected';
                                    } ?>>Allemagne</option>
        <option value="Arabie Saoudite" <?php if ('Arabie Saoudite' == $pArrivee) {
                                            echo 'selected';
                                        } ?>>Arabie Saoudite</option>
        <option value="Belgique" <?php if ('Belgique' == $pArrivee) {
                                        echo 'selected';
                                    } ?>>Belgique</option>
        <option value="Brésil" <?php if ('Brésil' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Brésil</option>
        <option value="Canada" <?php if ('Canada' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Canada</option>
        <option value="Égypte" <?php if ('Égypte' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Égypte</option>
        <option value="Espagne" <?php if ('Espagne' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Espagne</option>
        <option value="France" <?php if ('France' == $pArrivee) {
                                    echo 'selected';
                                } ?>>France</option>
        <option value="Liban" <?php if ('Liban' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Liban</option>
        <option value="Maroc" <?php if ('Maroc' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Maroc</option>
        <option value="Oman" <?php if ('Oman' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Oman</option>
        <option value="Portugal" <?php if ('Portugal' == $pArrivee) {
                                        echo 'selected';
                                    } ?>>Portugal</option>
        <option value="Russie" <?php if ('Russie' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Russie</option>
        <option value="Tunisie" <?php if ('Tunisie' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Tunisie</option>
        <option value="Turquie" <?php if ('Turquie' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Turquie</option>
        <option value="Zambie" <?php if ('Zambie' == $pArrivee) {
                                    echo 'selected';
                                } ?>>Zambie</option>
    </select><br>
    Date de vol:<input type="date" name="date_vol" style="margin-left:115px;" value="<?php echo $dateVol; ?>" required /><br>
    Nombre de personne:<input type="text" name="pers" style="margin-left:62px;" required /><br>
    <input type="submit" name="envoyer" value="Confirmer réservation" />


</form>
</body>

</html>