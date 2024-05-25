<?php
session_start();

if (!isset($_SESSION['email'])) {
    die("Vous devez être connecté pour voir cette page.");
}

$email = $_SESSION['email'];

// Connexion à la base de données
try {
    $conn = new PDO("mysql:host=localhost;dbname=marks_management", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupérer l'utilisateur
$stmt = $conn->prepare("SELECT id, username FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Utilisateur non trouvé.");
}

$user_id = $user['id'];
$username = $user['username'];

// Récupérer les notes et les matières validées par le coordinateur
$stmt = $conn->prepare("
    SELECT m.name AS module_name, ma.grade
    FROM modules m
    JOIN marks ma ON m.id = ma.module_id
    WHERE ma.user_id = ? AND ma.validated = 1
");
$stmt->execute([$user_id]);
$marks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mes Notes</title>
</head>
<body>
    <h2>Notes de <?php echo htmlspecialchars($username); ?></h2>
    <table border="1">
        <tr>
            <th>Matière</th>
            <th>Note</th>
        </tr>
        <?php
        foreach ($marks as $mark) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($mark['module_name']) . "</td>";
            echo "<td>" . htmlspecialchars($mark['grade']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
