<?php
$class_id = $_GET['class_id'];
$module_id = $_GET['module_id'];

// Connexion à la base de données
try {
    $conn = new PDO("mysql:host=localhost;dbname=marks_management", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupérer les étudiants de la classe sélectionnée avec leurs notes
$stmt = $conn->prepare("
    SELECT u.id, u.username, n.grade 
    FROM users u
    JOIN UserClasses uc ON u.id = uc.user_id
    LEFT JOIN notes n ON u.id = n.student_id AND n.module_id = ?
    WHERE uc.class_id = ?
");
$stmt->execute([$module_id, $class_id]);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier les Notes</title>
</head>
<body>
    <h2>Classe: <?php echo htmlspecialchars($class_id); ?>, Module: <?php echo htmlspecialchars($module_id); ?></h2>
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
                echo "<td><input type='number' name='grades[" . $student['id'] . "]' value='" . htmlspecialchars($student['grade']) . "' step='0.01' min='0' max='20'></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <input type="hidden" name="class_id" value="<?php echo htmlspecialchars($class_id); ?>">
        <input type="hidden" name="module_id" value="<?php echo htmlspecialchars($module_id); ?>">
        <input type="submit" value="Modifier les notes">
    </form>
</body>
</html>