<?php
// {{{ Controller class
class Controller extends CController
{
    const IDLE = 0;
    const SINGLE = 1;
    const MULTIPLAYER = 2;
    const CHALLENGE = 3;
    
    protected $jstype = 0;
}
// }}}
