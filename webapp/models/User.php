<?php

/**
 * This class represents one user
 */
class User extends CActiveRecord
{
    private $_confirmpass = NULL;

    public function PWHash($val)
    {
        return password_hash($val, PASSWORD_DEFAULT);
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName()
    {
        return 'users';
    }

    public function getConfirm()
    {
        return $this -> _confirmpass;
    }
    
    public function setConfirm($val)
    {
        $this -> _confirmpass = $val;
    }
    
    public function rules()
    {
        $rules = array();

        $rules[] = array('email,pword,confirm', 'required');
        $rules[] = array('email', 'email');
        $rules[] = array('email', 'unique', 'on' => 'insert');
        $rules[] = array('pword', 'compare', 'compareAttribute' => 'confirm');
        $rules[] = array('pword', 'filter', 'filter' => array($this, 'PWHash'));
        $rules[] = array('datecreated_utc', 'default', 'setOnEmpty' => FALSE, 'value' => gmdate('c'), 'on' => 'insert');
        $rules[] = array('datecreated', 'default', 'setOnEmpty' => FALSE, 'value' => date('c'), 'on' => 'insert');
        
        return $rules;
    }

    public function attributeLabels()
    {
        return array('email'   => 'Email',
                     'pword'   => 'Password',
                     'confirm' => 'Confirm Password');
    }
}
