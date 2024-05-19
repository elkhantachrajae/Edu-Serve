<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_id = $_POST['class'];
    $module_id = $_POST['module'];

    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=marks_management", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer le nom de la classe et du module
    $stmt = $conn->prepare("SELECT name FROM classes WHERE id = ?");
    $stmt->execute([$class_id]);
    $class_name = $stmt->fetchColumn();

    $stmt = $conn->prepare("SELECT name FROM modules WHERE id = ?");
    $stmt->execute([$module_id]);
    $module_name = $stmt->fetchColumn();

    // Récupérer les étudiants de la classe sélectionnée
    $stmt = $conn->prepare("
        SELECT u.id, u.username 
        FROM users u
        JOIN UserClasses uc ON u.id = uc.user_id
        WHERE uc.class_id = ?
    ");
    $stmt->execute([$class_id]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Entrer les Notes</title>
    </head>
    <body>
        <h2>Classe: <?php echo htmlspecialchars($class_name); ?>, Module: <?php echo htmlspecialchars($module_name); ?></h2>
        <form method="post" action="enrigestrer_notes.php">
            <table border="1">
                <tr>
                    <th>Étudiant</th>
                    <th>Note</th>
                </tr>
                <?php
                foreach ($students as $student) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($student['username']) . "</td>";
                    echo "<td><input type='number' name='grades[" . $student['id'] . "]' step='0.01' min='0' max='20'></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <input type="hidden" name="class_id" value="<?php echo htmlspecialchars($class_id); ?>">
            <input type="hidden" name="module_id" value="<?php echo htmlspecialchars($module_id); ?>">
            <input type="submit" value="Enregistrer les notes">
        </form>
    </body>
    </html>
    <?php
}
?>