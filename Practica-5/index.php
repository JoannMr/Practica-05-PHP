<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessió 5 – Variables superglobals PHP</title>
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
    <!-- TAREA 1 -->
    <h2>Formulari amb mètodes POST i GET</h2>
    <!-- Formulario usando el método POST -->
    <form action="procesar.php" method="post">
        <label for="nom">Nom:</label><br>
        <input type="text" name="nom" id="nom" required><br><br>

        <label for="email">Correu electrònic:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="missatge">Missatge:</label><br>
        <textarea name="missatge" id="missatge" rows="5" required></textarea><br><br>

        <button type="submit">Enviar (POST)</button>
    </form>

    <p><strong>Nota:</strong> Després d'enviar amb POST, podràs utilitzar un enllaç generat per a enviar les mateixes dades amb GET.</p>

    <!-- TAREA 2 -->
    <div id="tarea2" class="tarea">
        <h2>TAREA 2: Fitxers</h2>
        <!-- Formulario -->
        <form action="#tarea2" method="post" enctype="multipart/form-data">
            <label for="fitxer">Selecciona un fitxer:</label><br>
            <input type="file" name="fitxer" id="fitxer" accept=".jpg,.jpeg,.png,.gif" required><br><br>
            <button type="submit">Pujar fitxer</button>
        </form>

        <!-- Procesamiento --> 
        <h3>Resultats:</h3>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fitxer'])) {
            $fitxer = $_FILES['fitxer']; // Información del archivo
            $nom = $fitxer['name']; // Nombre 
            $tipus = $fitxer['type']; // MIME 
            $mida = $fitxer['size'] / 1024; // Tamaño 
            $error = $fitxer['error']; // Numero de error 

            // Validamos si hay alguna error o si es tipo jpeg,png o gif. Esta parte he usado paginas externas ya que no me salia. 
            if ($error === 0 && preg_match('/image\/(jpeg|png|gif)/', $tipus)) {
                echo "Fitxer pujat correctament!<br>";
                echo "Nom: $nom<br>";
                echo "Tipus: $tipus<br>";
                echo "Mida: " . number_format($mida, 2) . " KB<br>";
            } else {
                echo "Error en pujar el fitxer. Només es permeten imatges (JPG, PNG, GIF).";
            }
        }
        ?>
    </div>

    <!-- TAREA 3 -->
    <div id="tarea3" class="tarea">
        <h2>TAREA 3: Informació
        </h2>
        <?php
        // Mostramos información del servidor 
        echo "Nom del servidor: " . $_SERVER['SERVER_NAME'] . "<br>"; // Nombre 
        echo "Adreça IP del servidor: " . $_SERVER['SERVER_ADDR'] . "<br>"; // IP
        echo "Agent de l'usuari: " . $_SERVER['HTTP_USER_AGENT'] . "<br>"; // Navegador
        echo "Ruta de l'script actual: " . $_SERVER['SCRIPT_NAME'] . "<br>"; // Ruta
        ?>
    </div>
</body>
</html>
