<?php 

header('Content-Type: application/json');
include('./backend/db.php');

try {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = (int) $_POST['age'];

    $stmt = $db->prepare('INSERT INTO Utilisateur (nom, prenom, age) VALUES (?, ?, ?)');
    $result = $stmt->execute([$nom, $prenom, $age]);

    if ($result) {
        echo json_encode([
            'status' => 'success',
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to insert data'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>
