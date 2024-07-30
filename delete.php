<?php
header('Content-Type: application/json');
include ('./backend/db.php');

try {
    $id = (int) $_POST['id'];

    // Préparation de la requête SQL
    $stmt = $db->prepare('DELETE FROM utilisateur WHERE id = ?');
    $result = $stmt->execute([$id]);

    if ($result) {
        echo json_encode([
            'status' => 'success',
            'message' => 'User deleted successfully',
            'id' => $id
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to delete user'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>