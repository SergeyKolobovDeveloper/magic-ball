<?php
require_once __DIR__ . '/../actions/magic-ball-answer.php';
require_once __DIR__ . '/../includes/header.php';
?>

<main>
    <h1 class="title">Магічна куля</h1>

    <div class="ball-container">
        <div class="ball-outer">
            <div class="window">
                <span class="eight">8</span>
            </div>
        </div>
    </div>

    <?php if (!empty($error)): ?>
        <p class="error-mess"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (!empty($answer)): ?>
        <div class="result-box" style="background-color: <?= $color ?>;">
            <p class="user-question">Ваше питання: <span><?= htmlspecialchars($question) ?></span></p>
            <h2 class="user-answer"><?= htmlspecialchars($answer) ?></h2>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <label for="question">Задайте своє питання кулі:</label>
        <input type="text" name="question" id="question" class="input-question" value="<?= htmlspecialchars($question ?? '') ?>" placeholder="Наприклад: Чи буде завтра дощ?" required>
        <?php if(!empty($answer)): ?>
            <div class="buttons-group">
                <a href="magic-ball.php" class="submit reset-btn">Спитати ще раз</a>
                <input type="submit" class="submit btn btn-retry" value="Спробувати ще раз">
            </div>
        <?php else: ?>
            <input type="submit" class="submit" value="Поїхали">
        <?php endif ?>
    </form>
</main>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>