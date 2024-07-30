<?php
header('Content-Type: application/json');
include('./backend/db.php');

try {
    $stmt = $db->prepare("SELECT id, nom, age FROM Utilisateur");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result); 
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>