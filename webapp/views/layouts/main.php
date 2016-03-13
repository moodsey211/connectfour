<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo SITENAME; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="ConnectFour" />
        <meta name="author" content="Ismael Cristal Jr" />
        <!-- Stylesheets -->
        <link href="<?php echo Url::a('css/bootstrap.css'); ?>" rel="stylesheet" media="screen" />
        <link href="<?php echo Url::a('css/custom.min.css'); ?>" rel="stylesheet" />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="<?php echo Url::a('js/html5shiv.js'); ?>"></script>
        <script src="<?php echo Url::a('js/respond.min.js'); ?>"></script>
        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <?php if(Yii::app() -> user -> isGuest): ?>
                    <a href="<?php echo Url::l('user/login'); ?>" class="navbar-brand"><?php echo SITENAME; ?></a>
                    <?php else: ?>
                    <a href="<?php echo Url::l('user/dashboard'); ?>" class="navbar-brand"><?php echo SITENAME; ?></a>
                    <?php endif ?>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(Yii::app() -> user -> isGuest): ?>
                        <li><a href="<?php echo Url::l('user/register'); ?>">Register</a></li>
                        <?php else: ?>
                        <li><a><?php echo Yii::app() -> user -> getState('email'); ?></a></li>
                        <li><a href="<?php echo Url::l('user/logout'); ?>">Logout</a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php echo $content; ?>
    </body>
</html>
