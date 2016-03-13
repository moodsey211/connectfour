<div class="bs-component">
    <div class="alert alert-dismissible alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p></p><strong>Information:</strong> <?php echo $m; ?></p>
        <?php if(!empty($l)): ?>
        <ul>
            <?php foreach($l as $e): ?>
                <?php foreach($e as $err): ?>
            <li><?php echo $err; ?></li>
                <?php endforeach ?>
            <?php endforeach ?>
        </ul>
        <?php endif ?>
    </div>
</div>
