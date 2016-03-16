<?php

final class GameController extends Controller
{
    public function actionIndex()
    {
        $this -> redirect(Url::l('user/dashboard'));
    }

    public function actionMultiplayer()
    {
        if(Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/login'));
        }

        UserStatus::UpdateStatus(UserStatus::MULTIPLAYER);

        $this -> jstype = self::MULTIPLAYER;
        
        $this -> render('multiplayer');
    }
}
