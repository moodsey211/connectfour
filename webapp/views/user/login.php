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
                    <a href="<?php echo Url::l('user/login'); ?>" class="navbar-brand"><?php echo SITENAME; ?></a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo Url::l('user/register'); ?>">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <br />
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="page-header">Login</div>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="well bs-component">
                        <form class="form-horizontal">
                            <fieldset>
                                <legend>Credentials</legend>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputEmail" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </body>
</html>
