<?php
if (isset($_GET['class_id']) && isset($_GET['module_id'])) {
    $class_id = $_GET['class_id'];
    $module_id = $_GET['module_id'];

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

    // Récupérer les étudiants avec leurs notes
    $stmt = $conn->prepare("
        SELECT u.username, m.grade 
        FROM users u
        JOIN marks m ON u.id = m.user_id
        WHERE m.module_id = ? AND u.id IN (
            SELECT user_id FROM UserClasses WHERE class_id = ?
        )
    ");
    $stmt->execute([$module_id, $class_id]);
    $marks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Afficher les Notes</title>
    </head>
    <body>
        <h2>Classe: <?php echo htmlspecialchars($class_name); ?>, Module: <?php echo htmlspecialchars($module_name); ?></h2>
        <table border="1">
            <tr>
                <th>Étudiant</th>
                <th>Note</th>
            </tr>
            <?php
            foreach ($marks as $mark) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($mark['username']) . "</td>";
                echo "<td>" . htmlspecialchars($mark['grade']) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <form method="post" action="saisirMarks.php">
            <input type="hidden" name="class" value="<?php echo htmlspecialchars($class_id); ?>">
            <input type="hidden" name="module" value="<?php echo htmlspecialchars($module_id); ?>">
            <input type="submit" value="Modifier">
        </form>
    </body>
    </html>
    <?php
} else {
    echo "Class ID ou Module ID manquant.";
}
?>
