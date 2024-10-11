<?php
$host = 'localhost'; // MAMPの場合は 'localhost'。本番環境では変更。
$dbname = 'todo_app'; // 作成したデータベース名。
$username = 'root'; // MAMPの場合のデフォルトユーザー名は 'root'。
$password = 'root'; // MAMPのデフォルトパスワード。

try {
    // データベースへの接続を作成
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // エラーモードを例外に設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'データベース接続エラー: ' . $e->getMessage();
    exit;
}