<?php
if (!empty($_SESSION['tasks'])):
    foreach ($_SESSION['tasks'] as $index => $task): ?>
        <li>
            <?php echo $task; ?>
            <a href="delete_task.php?delete=<?php echo $index; ?>">削除</a>
        </li>
    <?php endforeach;
else: ?>
    <li>タスクはありません。</li>
<?php endif; ?>