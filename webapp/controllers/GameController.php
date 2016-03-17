<?php

final class GameController extends Controller
{
    public function actionIndex()
    {
        $this -> redirect(Url::l('user/dashboard'));
    }

    public function actionInitLocalGame()
    {
        $gp = new GamePlayed;

        $gp -> redplayer = Yii::app() -> user -> ID;
        $gp -> islocal = TRUE;
        $gp -> gamestarted_utc = gmdate('c');
        $gp -> gamestarted = date('c');
        $gp -> gameended_utc = gmdate('c');
        $gp -> gameended = date('c');

        $gp -> save();

        echo $gp -> gameid;
        exit;
    }

    public function actionWinnerRed()
    {
        GamePlayed::UpdateStatus(GamePlayed::WINNER);
    }

    public function actionLosserRed()
    {
        GamePlayed::UpdateStatus(GamePlayed::LOSSER);
    }

    public function actionTie()
    {
        GamePlayed::UpdateStatus(GamePlayed::TIE);
    }
    
    public function actionRecordMove()
    {
        $det = new GameDetail;

        $det -> gameid = $_POST['gameid'];
        $det -> moveby = $_POST['moveby'];
        $det -> colnum = $_POST['colnum'];
        $det -> movecount = $_POST['movecnt'];
        $det -> movetime_utc = gmdate('c');
        $det -> movetime = date('c');

        $det -> save();
        exit;
    }
    
    public function actionMultiplayer()
    {
        if(Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/login'));
        }

        UserStatus::UpdateStatus(UserStatus::MULTIPLAYER);
        GamePlayed::UpdateStatus();
        
        $this -> jstype = self::MULTIPLAYER;
        
        $this -> render('multiplayer', array('title' => 'Local Game (Multiplayer)'));
    }

    public function actionSingle()
    {
        if(Yii::app() -> user -> isGuest) {
            $this -> redirect(Url::l('user/login'));
        }

        UserStatus::UpdateStatus(UserStatus::SINGLE);
        GamePlayed::UpdateStatus();
        
        $this -> jstype = self::SINGLE;
        
        $this -> render('multiplayer', array('title' => 'Local Game (Single)'));
    }
}
