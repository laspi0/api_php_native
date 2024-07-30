<?php
header('Content-Type: application/json');
include('./backend/db.php');

try {
    $id = (int) $_POST['id'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $age = (int) $_POST['age'];

    // Préparation de la requête SQL
    $stmt = $db->prepare('UPDATE utilisateur SET nom = ?, prenom = ?, age = ? WHERE id = ?');
    $result = $stmt->execute([$nom, $prenom, $age, $id]);

    if ($result) {
        echo json_encode([
            'status' => 'success',
            'message' => 'User updated successfully'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to update user'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>
