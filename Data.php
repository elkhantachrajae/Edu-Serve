<?php
// Data arrays (example data)
$users = [
    ['id', 'username', 'password', 'role'],
    [1, 'Rajae El Khnatach', 'S110', 'student'],
    [2, 'lougmiri fatima zohra', 'S120', 'student'],
    [3, 'souhaila el meftahi', 'S130', 'student'],
    [4, 'fatima elouafi', 'S140', 'student'],
    [5, 'tati mohammed', 'S150', 'student'],
    [6, 'othman el hedrati', 'S160', 'student']
];

$classes = [
    ['id', 'name'],
    [1, 'génie informatique 1'],
    [2, 'génie informatique 2'],
    [3, 'génie informatique 3'],
    [4, 'Ingenieur des données 1'],
    [5, 'Ingenieur des données 2'],
    [6, 'Ingenieur des données 3']
];

$modules = [
    ['id', 'name', 'class_id'],
    [1, 'Machine Learning', 2],
    [2, 'Cpp', 1],
    [3, 'Python', 4],
    [4, 'Recherche opérationnelle', 5],
    [5, 'Reseaux', 3],
    [6, 'Base de données', 6]
];

$userClasses = [
    ['user_id', 'class_id'] ,
    [1, 1],
    [2, 1],
    [3, 3],
    [4, 5],
    [5, 6],
    [6, 2]
];

// Paths to save the CSV files
$csvFilePathUsers = 'users.csv';
$csvFilePathClasses = 'classes.csv';
$csvFilePathModules = 'modules.csv';
$csvFilePathUserClasses = 'userClasses.csv';

// Function to create CSV files
function createCsvFile($data, $filePath) {
    $file = fopen($filePath, 'w');
    foreach ($data as $row) {
        fputcsv($file, $row);
    }
    fclose($file);
}

// Create CSV files
createCsvFile($users, $csvFilePathUsers);
createCsvFile($classes, $csvFilePathClasses);
createCsvFile($modules, $csvFilePathModules);
createCsvFile($userClasses, $csvFilePathUserClasses);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marks_management";

try {
    // Connect to the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Function to import CSV data into a table
    function importCsvToTable($conn, $filePath, $table, $columns) {
        if (($handle = fopen($filePath, "r")) !== false) {
            // Skip the header row
            fgetcsv($handle);

            // Prepare the SQL INSERT statement
            $placeholders = implode(',', array_fill(0, count($columns), '?'));
            $sql = "INSERT INTO $table (" . implode(',', $columns) . ") VALUES ($placeholders)";
            $stmt = $conn->prepare($sql);

            // Loop through each row of the CSV file
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                // Execute the statement
                $stmt->execute($data);
            }

            // Close the file handle
            fclose($handle);

            echo "CSV data imported into table $table successfully<br>";
        } else {
            echo "Error opening CSV file $filePath<br>";
        }
    }

    // Import data into the tables
    importCsvToTable($conn, $csvFilePathUsers, 'users', ['id', 'username', 'password', 'role']);
    importCsvToTable($conn, $csvFilePathClasses, 'classes', ['id', 'name']);
    importCsvToTable($conn, $csvFilePathModules, 'modules', ['id', 'name', 'class_id']);
    importCsvToTable($conn, $csvFilePathUserClasses, 'UserClasses', ['user_id', 'class_id']);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>