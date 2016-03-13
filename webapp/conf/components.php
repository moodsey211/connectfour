<?php

$c = array();

$c['urlManager'] = array('urlFormat' => 'path');

/*$c['db'] = array('class'                   => 'CDbConnection',
                 'connectionString'        => 'pgsql:dbname='.hrx_dbname,
                 'username'                => hrx_dbuser,
                 'password'                => hrx_dbpass);

$c['session'] = array('class'                  => 'CHttpSession',
                      'cookieMode'             => 'allow',
                      'timeout'                => 1440);

$c['user'] = array('class'           => 'WebUser',
                   'allowAutoLogin'  => TRUE,
                   'loginUrl'        => 'site/index');

$c['cache'] = array('class'	=> 'system.caching.CXCache');*/

return $c;
