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
            <?php $this -> widget('NotificationWidget'); ?>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="well bs-component">
                <form class="form-horizontal" method="POST" action="<?php echo Url::l('user/dologin'); ?>">
                    <fieldset>
                        <legend>Credentials</legend>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="email" placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="pword" placeholder="Password" />
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
