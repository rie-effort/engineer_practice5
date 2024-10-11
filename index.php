<?php
session_start();
require 'db.php'; // データベース接続

// データベースからタスクを取得
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>ToDoリスト</h1>

        <!-- タスク追加フォーム -->
        <form action="add_task.php" method="POST">
            <input type="text" name="task" placeholder="タスクを入力" required>
            <button type="submit">追加</button>
        </form>

        <!-- データベースから取得したタスクリストを表示 -->
        <ul>
            <?php if ($tasks): ?>
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <!-- タスクの内容を表示 -->
                        <?php echo htmlspecialchars($task['task']); ?>
                        <a href="delete_task.php?id=<?php echo $task['id']; ?>">削除</a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>タスクはありません。</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
