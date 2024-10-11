<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // タスクをデータベースから削除
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// メインページにリダイレクト
header('Location: index.php');
exit();
