<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processar dades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2 {
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <h2>Resultats del Processament</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Metodo POST
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $missatge = htmlspecialchars($_POST['missatge']);

        echo "<h3>Metode POST:</h3>";
        echo "Nom: $nom<br>";
        echo "Email: $email<br>";
        echo "Missatge: $missatge<br>";

        // Pasa la info del POST al GET, no sabia como hacerlo y tuve que mirar paginas externas.
        $queryString = http_build_query([
            'nom' => $nom,
            'email' => $email,
            'missatge' => $missatge
        ]);

        echo '<p><a href="procesar.php?' . $queryString . '">Enviar dades amb GET</a></p>';
    
    } elseif (!empty($_GET)) {
        // Metodo GET
        $nom = htmlspecialchars($_GET['nom']);
        $email = htmlspecialchars($_GET['email']);
        $missatge = htmlspecialchars($_GET['missatge']);

        echo "<h3>Dades rebudes amb GET:</h3>";
        echo "Nom: $nom<br>";
        echo "Email: $email<br>";
        echo "Missatge: $missatge<br>";
    } else {
        echo "<p>No s'han rebut dades per POST ni per GET.</p>";
    }
    ?>
</body>
</html>
