<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grades = $_POST['grades'];
    $class_id = $_POST['class_id'];
    $module_id = $_POST['module_id'];
    $professor_id = $_POST['user_id'];  // Assuming you pass the professor's ID

    // Connexion à la base de données
    try {
        $conn = new PDO("mysql:host=localhost;dbname=marks_management", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // Préparation de la requête d'insertion ou de mise à jour des notes
    $sql = "INSERT INTO marks (user_id, module_id, grade) VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE grade = VALUES(grade)";
    $stmt = $conn->prepare($sql);

    // Parcourir les notes soumises et les insérer ou les mettre à jour
    foreach ($grades as $user_id => $grade) {
        $stmt->execute([$user_id, $module_id, $grade]);
    }

    // Récupérer le nom du module
    $stmt = $conn->prepare("SELECT name FROM modules WHERE id = ?");
    $stmt->execute([$module_id]);
    $module_name = $stmt->fetchColumn();

    // Récupérer le nom du professeur
    $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->execute([$professor_id]);
    $professor_name = $stmt->fetchColumn();

    // Récupérer les adresses email des étudiants de la classe concernée
    $stmt = $conn->prepare("
        SELECT u.email
        FROM users u
        JOIN UserClasses uc ON u.id = uc.user_id
        WHERE uc.class_id = ?
    ");
    $stmt->execute([$class_id]);
    $emails = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    // Composer le message
    $subject = "Mise à jour des notes pour le module: $module_name";
    $message = "Cher étudiant,\n\nLes notes pour le module '$module_name' ont été mises à jour par le professeur $professor_name. Veuillez consulter votre espace étudiant pour plus de détails.\n\nCordialement,\nL'équipe pédagogique";

    // Envoyer un email à chaque étudiant
    foreach ($emails as $email) {
        mail($email, $subject, $message);
    }

    // Rediriger vers la page d'affichage des notes
    header("Location: afficher_notes.php?class_id=$class_id&module_id=$module_id");
    exit();
}
?>
