<?php

/*
 * Used to validate user login
 */
class UserIdentity extends CUserIdentity
{
    private $_id = NULL;

    public function getMessage()
    {
        switch($this -> errorCode) {
            case self::ERROR_USERNAME_INVALID:
                return 'Incorrect username';
            case self::ERROR_PASSWORD_INVALID:
                return 'Invalid password';
            case self::ERROR_UNKNOWN:
                return 'Unknown error.';
        }
    }
    
    public function authenticate()
    {
        $w = array('email' => $this -> username);
        
        $rec = User::model() -> findByAttributes($w);

        if(empty($rec)) {
            $this -> errorCode = self::ERROR_USERNAME_INVALID;
        } else if(!password_verify($this->password, $rec -> pword)) {
            $this -> errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this -> _id = $rec -> userid;
            $this -> setState('email', $rec -> email);
            $this -> errorCode = self::ERROR_NONE;
        }
        
        return !$this -> errorCode;
    }

    public function getId()
    {
        return $this -> _id;
    }
}
