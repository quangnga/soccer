<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div style="color: #fff;" class="<?= h($class) ?>"><?= h($message) ?></div>
