<?php
/**
 * This class will help us in formatting our URL
 */
class Url extends Helper
{
    public static function l($part, $data = array())
    {
        return Yii::app() -> createAbsoluteURL($part, $data);
    }

    public static function a($part, $data = array())
    {
        $url = str_replace('index.php/', '', self::l($part, $data));

        return $url;
    }
}
