<?php

/**
 * All configurations are written here
 */

require_once('constants.php');

return array('basePath'          => APPLICATIONPATH,
             'defaultController' => 'user',
             'import'            => require('imports.php'),
             'components'        => require('components.php'));
