<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grades = $_POST['grades'];
    $class_id = $_POST['class_id'];
    $module_id = $_POST['module_id'];

    // Connexion à la base de données
    try {
        $conn = new PDO("mysql:host=localhost;dbname=marks_management", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // Préparation de la requête d'insertion ou de mise à jour des notes
    $sql = "INSERT INTO notes (student_id, module_id, grade) VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE grade = VALUES(grade)";
    $stmt = $conn->prepare($sql);

    // Parcourir les notes soumises et les insérer ou les mettre à jour
    foreach ($grades as $student_id => $grade) {
        $stmt->execute([$student_id, $module_id, $grade]);
    }

    // Rediriger vers la page d'affichage des notes
    header("Location: afficher_notes.php?class_id=$class_id&module_id=$module_id");
    exit();
}
?>