<?php

$bgClass = '';
$question = '';
$answer = '';
$error = '';
$color = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $question = trim($_POST['question'] ?? '');

    $error = '';
    if (empty($question)) {
        $error = 'Задайте питання!';
    } elseif (!str_ends_with($question, '?')) {
        $error = 'Питання має закінчуватися знаком питання (?)!';
    } else {
        $positive = ['Безперечно так','Безперечно','Жодних сумнівів','Моя відповідь - ТАК','Можеш бути впевнений у цьому'];
        $negative = ['Навіть не думай','Моя відповідь - НІ','Моя відповідь - НІ','Перспективи не дуже добрі'];
        $tentatively_positive = ['Мені здається - так', 'Найімовірніше', 'Гарні перспективи', 'Можливо', 'Знаки кажуть - так'];
        $neutral = ['Поки не зрозуміло, спробуй ще', 'Запитай пізніше', 'Краще не розповідати', 'Сконцентруйся і спитай знову'];

        $randomCategory = rand(1, 4);

        $selectedArray = match($randomCategory) {
            1 => $positive,
            2 => $negative,
            3 => $tentatively_positive,
            4 => $neutral
        };

        $color = match($randomCategory) {
            1 => '#006400',
            2 => '#8B0000',
            3 => '#800080',
            4 => '#000080'
        };

        $bgClass = match($randomCategory) {
            1 => 'bg-positive',
            2 => 'bg-negative',
            3 => 'bg-tentative',
            4 => 'bg-neutral'
        };

        $answer = $selectedArray[array_rand($selectedArray)];
    }
}