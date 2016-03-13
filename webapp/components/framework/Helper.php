<?php
/**
 * This class is used to make sure that we do not instantiate any of it's
 * sub classes.
 */
// {{{ Controller class
class Helper
{
    final public function __construct()
    {
        throw new Exception('class should not be instantiated');
    }
}
// }}}
