<div class="container">
    <br />
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="page-header">Register</div>
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
                <form class="form-horizontal" method="POST" action="<?php echo Url::l('user/doregister'); ?>">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" name="email" class="form-control" placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" name="pword" class="form-control" placeholder="Password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">&nbsp;</label>
                            <div class="col-lg-10">
                                <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
