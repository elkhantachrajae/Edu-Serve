<?php
session_start(); // Démarrer la session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_id = $_POST['class'];
    $module_id = $_POST['module'];
    // Récupérer l'ID du professeur depuis la session
    $professor_id = $_SESSION['user_id'];

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

    // Récupérer les étudiants de la classe sélectionnée avec leurs notes
    $stmt = $conn->prepare("
        SELECT u.id, u.username, n.grade 
        FROM users u
        JOIN UserClasses uc ON u.id = uc.user_id
        LEFT JOIN marks n ON u.id = n.user_id AND n.module_id = ?
        WHERE uc.class_id = ?
    ");
    $stmt->execute([$module_id, $class_id]);
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
                    echo "<td><input type='number' name='grades[" . htmlspecialchars($student['id']) . "]' value='" . htmlspecialchars($student['grade']) . "' step='0.01' min='0' max='20'></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <input type="hidden" name="class_id" value="<?php echo htmlspecialchars($class_id); ?>">
            <input type="hidden" name="module_id" value="<?php echo htmlspecialchars($module_id); ?>">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['prof_id']); ?>">
            <input type="submit" value="Enregistrer les notes">
        </form>
    </body>
    </html>
    <?php
}
?>
