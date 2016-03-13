<?php
/**
 * This is our default controller
 */
final class UserController extends Controller
{
    public function actionIndex()
    {
        $this -> redirect(Url::l('user/login'));
    }

    public function actionLogin()
    {
        $this -> render('login');
    }
}
