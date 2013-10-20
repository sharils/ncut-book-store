<?php
require_once 'controllers/teacher_course/notice.php';
?>
<div class ="col-9 center">
    <?php if ($flag > 0): ?>
        <div class="alert alert-danger">您有課程尚未開立書單，請盡快填寫！</div>
    <?php else: ?>
        <div class="alert alert-info">您的課程皆已開立書單，謝謝合作！</div>
    <?php endif; ?>
</div>
