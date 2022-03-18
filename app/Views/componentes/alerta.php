<?php if (session('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo session('error'); ?>
    </div>
<?php endif; ?>
<?php if (session('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo session('success'); ?>
    </div>
<?php endif; ?>