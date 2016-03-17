<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <h1 id="whomoves">&nbsp;Player one should move</h1>
        </div>
        <div class="col-lg-8">
        <table class="gameboard">
            <?php for($i = 6; $i > 0; $i--): ?>
            <tr>
                <?php for($j = 1; $j < 8; $j++): ?>
                <td><a id="row<?php echo $i; ?>col<?php echo $j; ?>" data-row="<?php echo $i; ?>" data-column="<?php echo $j; ?>" class="blank"></a></td>
                <?php endfor ?>
            </tr>
            <?php endfor ?>
        </table>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
