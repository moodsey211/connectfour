<?php

class GamePlayed extends CActiveRecord
{
    const PLAYING = 0;
    const ABBANDONED = 1;
    const TIE = 2;
    const WINNER = 3;
    const LOSSER = 4;
    
    public static function UpdateStatus($s = self::ABBANDONED)
    {
        $id = Yii::app() -> user -> ID;
        $c = new CDbCriteria;

        $c -> condition = '(redplayer = :player OR blackplayer = :player) AND gamestatus = 0';
        $c -> params = array(':player' => $id);
        
        $obj = self::model() -> find($c);

        if(!empty($obj)) {
            switch($s) {
                case self::PLAYING:
                    $obj -> gamestatus = 0;
                    break;
                case self::ABBANDONED:
                    $obj -> gamestatus = ($obj -> redplayer == $id) ? 1 : 2;
                    break;
                case self::TIE:
                    $obj -> gamestatus = 3;
                    break;
                case self::WINNER:
                    $obj -> gamestatus = 4;
                    break;
                case self::LOSSER:
                    $obj -> gamestatus = 5;
                    break;
            }
            
            $obj -> gameended_utc = gmdate('c');
            $obj -> gameended = date('c');

            $obj -> save();
        }
    }
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName()
    {
        return 'gamesplayed';
    }
}
