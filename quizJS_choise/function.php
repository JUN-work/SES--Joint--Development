<?php
function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

$quizSet = [];
$quizSet[] = [
  'q' => 'Aの答えは??',
  'a' => ['A0', 'A1', 'A2', 'A3']
];
$quizSet[] = [
  'q' => 'Bの答えは??',
  'a' => ['B0', 'B1', 'B2', 'B3']
];
$quizSet[] = [
  'q' => 'Cの答えは??',
  'a' => ['C0', 'C1', 'C2', 'C3']
];

$current_num = 0;

$data = $quizSet[$current_num];
shuffle($data['a']);
?>