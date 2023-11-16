<?php

use App\Libraries\MyClass;

?>
<?php if (MyClass::has_flash('message')) : ?>
    <?php $message = MyClass::get_flash('message'); ?>
    <div class="alert alert-<?= $message['type']; ?> alert-dismissible fade show" role="alert">
        <strong> <?= $message['msg']; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>