&&<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choisir Classe et Module</title>
</head>
<body>
    <h1>Choisir Classe et Module</h1>
    <form method="post" action="choisir_classe_module.php">
        <label for="class">Classe:</label>
        <select name="class" id="class" required>
            <?php
            // Connexion à la base de données
            $conn = new PDO("mysql:host=localhost;dbname=marks_management", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Récupérer les classes
            $stmt = $conn->prepare("SELECT id, name FROM classes");
            $stmt->execute();
            $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($classes as $class) {
                echo "<option value='" . $class['id'] . "'>" . $class['name'] . "</option>";
            }
            ?>
        </select>
        <br><br>
        <label for="module">Module:</label>
        <select name="module" id="module" required>
            <?php
            // Récupérer les modules
            $stmt = $conn->prepare("SELECT id, name FROM modules");
            $stmt->execute();
            $modules = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($modules as $module) {
                echo "<option value='" . $module['id'] . "'>" . $module['name'] . "</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Valider">
    </form>
</body>
</html>