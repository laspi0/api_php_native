<?php
header('Content-Type: application/json');
include('./backend/db.php');

try {
    $id = (int) $_POST['id'];

    $stmt = $db->prepare('SELECT nom, prenom, age FROM utilisateur WHERE id = ?');
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode([
            'status' => 'success',
            'result' => $result
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No user found with the given ID'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>
