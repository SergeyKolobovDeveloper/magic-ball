<?php
require_once __DIR__ . '/../actions/magic-ball-answer.php';
require_once __DIR__ . '/../includes/header.php';
?>

<main>
    <h1 class="title">Магічна куля</h1>
    <?php if (!empty($error)): ?>
        <p class="error-mess"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <?php if (!empty($answer)): ?>
        <div class="result-box" style="background-color: <?= $color ?>; color: #fff">
            <h2 class="user-question">Ваше питання: <?= htmlspecialchars($question) ?></h2>
            <h3 class="user-answer">відповідь: <?= htmlspecialchars($answer) ?></h3>
        </div>
    <?php endif; ?>
    <form action="" method="post">
        <label for="question">Напишіть питання</label>
        <input type="text" name="question" id="question" class="input-question" value="<?= htmlspecialchars($question ?? '') ?>">
        <input type="submit" value="Поїхали">
    </form>
</main>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>