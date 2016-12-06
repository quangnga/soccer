<link rel="stylesheet" type="text/css" href="css/turbo-tribble.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/turbo-tribble.js"></script>
<?php
    $class = 'tribble';
    if (!empty($params['class'])) {
        $class .= ' ' . $params['class'];
    }
?>
<div class="<?= h($class) ?>"><?= h($message) ?></div>