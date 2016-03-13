<?php

/**
 * Notification class to handle error and warnings
 */
class NotificationWidget extends CWidget
{
    public function run()
    {
        $not = Yii::app() -> user -> getFlash('notify');
        $tpe = Yii::app() -> user -> getFlash('notifytype');
        $msg = Yii::app() -> user -> getFlash('errmsg');
        $lst = Yii::app() -> user -> getFlash('errlst');

        if($not) {
            $this -> render($tpe, array('m' => $msg, 'l' => $lst));
        }
    }
}
