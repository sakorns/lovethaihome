<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden');">
    <p><strong>Oh!</strong> <?= h($message) ?></p>
</div>