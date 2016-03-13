<?php

/**
 * Let's set the default date to ensure we are using the correct timestamp
 */
date_default_timezone_set('Asia/Manila');

/**
 * path definitions
 */
define('WWWPATH', __DIR__ .'/');
define('SYSTEMPATH', WWWPATH.'yii/');
define('APPLICATIONPATH', WWWPATH.'webapp/');

/**
 * Constant definitions
 */
define('ENVIRONMENT', 'development');
define('EMPTYSTRING', '');

/**
 * Standard checking and settings for Yii
 */
if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            define('YII_DEBUG', 1);
        break;

        case 'testing':
        case 'production':
            error_reporting(0);
            define('YII_DEBUG', 0);
        break;

        default:
            exit('The application environment is not set correctly.');
    }
}

if (!is_dir(SYSTEMPATH)) {
    exit("Your system folder path does not appear to be set correctly.");
}

switch (ENVIRONMENT) {
    case 'testing':
        require_once(SYSTEMPATH.'yiit.php');
    break;
    case 'development':
    case 'production':
        require_once(SYSTEMPATH.'yii.php');
    break;

    default:
        exit('The application environment is not set correctly.');
}
/**
 * Standard checking ends here
 */

$conf = require_once(APPLICATIONPATH.'conf/webapp.php');

$app = Yii::createApplication('CWebApplication', $conf);

$app -> run();
