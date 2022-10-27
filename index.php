<html>

<head>
   <title>SRS pour voyage</title>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <video autoplay muted loop id='vd' style="position: absolute; width:1349px;">
      <source src='css/images/video.mp4'>
   </video>
   <header>
      <ul>
         <li><a href="index.php">Accueil</a></li>
         <li><a href="contact.php">Contact</a></li>
      </ul>
   </header>
   <div class="form_search">
      <?php include_once("class/DB_conn.php");  ?>
      <h1 style="text-shadow: 1px 1px 2px #e85e46, 0 0 1em #ff00eb, 0 0 0.2em white;">Agence de voyage</h1>
      <form method="post" action="afficher_vol.php">
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
      <div class="form2">
         <form method="post" action="monVol.php">
            <input type="text" name="mail" placeholder="Entrez votre email..." required />
            <a href="monVol.php"><input type="submit" value="Consulter mon vol" /></a>
         </form>
      </div>
   </div>
</body>

</html>