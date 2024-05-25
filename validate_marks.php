<?php
// Inclure le fichier d'autoloader de PHPMailer
require_once 'PHPMAILER/src/Exception.php';
require_once 'PHPMAILER/src/SMTP.php';
require_once 'PHPMAILER/src/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

// Vérifier si l'utilisateur est un coordinateur
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'coordinator') {
    header("Location: login.php");
    exit();
}

// Connexion à la base de données
try {
    $conn = new PDO("mysql:host=localhost;dbname=marks_management", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

$coordinator_email = $_SESSION['email']; // Utilisez l'adresse e-mail du coordinateur connecté

// Récupérer les classes et les modules pour la liste déroulante
$classes = $conn->query("SELECT id, name FROM classes")->fetchAll(PDO::FETCH_ASSOC);
$modules = $conn->query("SELECT id, name FROM modules")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['class'], $_POST['module'])) {
    $class_id = $_POST['class'];
    $module_id = $_POST['module'];

    // Récupérer le nom de la classe
    $stmt = $conn->prepare("SELECT name FROM classes WHERE id = ?");
    $stmt->execute([$class_id]);
    $class_name = $stmt->fetchColumn();

    // Récupérer le nom du module
    $stmt = $conn->prepare("SELECT name FROM modules WHERE id = ?");
    $stmt->execute([$module_id]);
    $module_name = $stmt->fetchColumn();

    // Récupérer les étudiants et leurs notes pour la classe et le module sélectionnés
    $stmt = $conn->prepare("
        SELECT u.username, u.email, m.grade, m.validated 
        FROM users u
        JOIN UserClasses uc ON u.id = uc.user_id
        LEFT JOIN marks m ON u.id = m.user_id AND m.module_id = ?
        WHERE uc.class_id = ?
    ");
    $stmt->execute([$module_id, $class_id]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validate'])) {
    $class_id = $_POST['class_id'];
    $module_id = $_POST['module_id'];

    // Valider toutes les notes pour la classe et le module sélectionnés
    $stmt = $conn->prepare("
        UPDATE marks 
        SET validated = 1 
        WHERE module_id = ? 
        AND user_id IN (
            SELECT user_id 
            FROM UserClasses 
            WHERE class_id = ?
        )
    ");
    $stmt->execute([$module_id, $class_id]);

    // Envoyer un email aux étudiants concernés
    $mail = new PHPMailer(true); // true active les exceptions
    try {
        // Définir les paramètres SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'e.service.ensah@gmail.com'; // Remplacez par votre adresse e-mail Gmail
        $mail->Password = 'EserviceEnsah963.'; // Remplacez par votre mot de passe Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 25;

        foreach ($students as $student) {
            $mail->setFrom($coordinator_email, 'Votre Nom');
            $mail->addAddress($student['email'], $student['username']);
            $mail->Subject = "Notification de validation des notes";
            $mail->Body = "Cher " . $student['username'] . ",\n\nVos notes pour le module " . $module_name . " ont été validées.\n\nCordialement,\nLe Coordinateur";

            $mail->send();
        }
        echo "Emails envoyés avec succès.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
    }

    header("Location: validate_marks.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validate Grades</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Validate Grades</h2>
        <form method="post" action="">
            <div class="mb-3">
            <label for="class" class="form-label">Class</label>
                <select id="class" name="class" class="form-select">
                    <?php foreach ($classes as $class): ?>
                        <option value="<?php echo htmlspecialchars($class['id']); ?>"><?php echo htmlspecialchars($class['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="module" class="form-label">Module</label>
                <select id="module" name="module" class="form-select">
                    <?php foreach ($modules as $module): ?>
                        <option value="<?php echo htmlspecialchars($module['id']); ?>"><?php echo htmlspecialchars($module['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Show Grades</button>
        </form>
        <?php if (isset($students)): ?>
            <h3 class="mt-5">Class: <?php echo htmlspecialchars($class_name); ?>, Module: <?php echo htmlspecialchars($module_name); ?></h3>
            <form method="post" action="">
            <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Grade</th>
                            <th>Validated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($student['username']); ?></td>
                                <td><?php echo htmlspecialchars($student['grade']); ?></td>
                                <td><?php echo $student['validated'] ? 'Yes' : 'No'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="hidden" name="class_id" value="<?php echo htmlspecialchars($class_id); ?>">
                <input type="hidden" name="module_id" value="<?php echo htmlspecialchars($module_id); ?>">
                <button type="submit" name="validate" class="btn btn-success">Validate Grades</button>
            </form>
        <?php endif; ?>
    </div>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
