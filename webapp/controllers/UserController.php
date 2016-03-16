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
        if(Yii::app() -> user -> isGuest) {
            $this -> render('login');
        } else {
            $this -> redirect(Url::l('user/dashboard'));
        }
    }

    public function actionDashboard()
    {
        if(Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/login'));
        }

        UserStatus::UpdateStatus(UserStatus::IDLE);

        $this -> jstype = self::IDLE;
        
        $this -> render('dashboard');
    }
    
    public function actionRegister()
    {
        $this -> render('register');
    }

    public function actionLogout()
    {
        Yii::app() -> user -> logout();

        $this -> redirect(Url::l('user/login'));
    }
    
    public function actionDoLogin()
    {
        if(!Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/dashboard'));
        }
        
        $ident = new UserIdentity($_POST['email'], $_POST['pword']);

        if($ident -> authenticate()) {
            Yii::app() -> user -> login($ident);

            $this -> redirect(Url::l('user/dashboard'));
        } else {
            Yii::app() -> user -> setFlash('notify', TRUE);
            Yii::app() -> user -> setFlash('notifytype', 'error');
            Yii::app() -> user -> setFlash('errmsg', $ident -> Message);

            $this -> redirect(Url::l('user/login'));
        }
    }
    
    public function actionDoRegister()
    {
        if(!Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/dashboard'));
        }
        
        $u = new User;

        $u -> attributes = $_POST;

        if(!$u -> validate()) {
            Yii::app() -> user -> setFlash('notify', TRUE);
            Yii::app() -> user -> setFlash('notifytype', 'error');
            Yii::app() -> user -> setFlash('errmsg', 'Failed to register.');
            Yii::app() -> user -> setFlash('errlst', $u -> Errors);

            $this -> redirect(Url::l('user/register'));
        }

        $u -> save(FALSE);
        Yii::app() -> user -> setFlash('notify', TRUE);
        Yii::app() -> user -> setFlash('notifytype', 'success');
        Yii::app() -> user -> setFlash('errmsg', 'Successfully registered.');

        $this -> redirect(Url::l('user/login'));
    }

    public function actionStatusIdle()
    {
        if(Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/login'));
        }
        
        UserStatus::UpdateStatus(UserStatus::IDLE);
        exit;
    }

    public function actionStatusSingle()
    {
        if(Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/login'));
        }
        
        UserStatus::UpdateStatus(UserStatus::SINGLE);
        exit;
    }

    public function actionStatusMultiplayer()
    {
        if(Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/login'));
        }
        
        UserStatus::UpdateStatus(UserStatus::MULTIPLAYER);
        exit;
    }

    public function actionStatusChallenge()
    {
        if(Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/login'));
        }
        
        UserStatus::UpdateStatus(UserStatus::CHALLENGE);
        exit;
    }
}
