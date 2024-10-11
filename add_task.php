<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['task'])) {
    $task = htmlspecialchars($_POST['task']);
    $created_at = date('Y-m-d H:i:s'); // 現在のタイムスタンプを取得

    // タスクをデータベースに追加
    $stmt = $pdo->prepare("INSERT INTO tasks (task, created_at) VALUES (:task, :created_at)");
    $stmt->bindParam(':task', $task, PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR); // created_atも挿入
    $stmt->execute();
}

// メインページにリダイレクト
header('Location: index.php');
exit();
