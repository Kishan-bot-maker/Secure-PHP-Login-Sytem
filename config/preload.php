<?php
declare(strict_types=1);
/**
 * This file is a part of secure-php-login-system.
 *
 * @author Akbar Hashmi (Owner/Developer)           <me@akbarhashmi.com>.
 * @author Nicholas English (Contributor/Developer) <nenglish0820@outlook.com>.
 *
 * @link    <https://github.com/akbarhashmi/Secure-PHP-Login-System> Github repository.
 * @license <https://github.com/akbarhashmi/Secure-PHP-Login-System/blob/master/LICENSE> MIT license.
 */

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

$configPaths = [
    'cookie.conf.yml',
    'login.conf.yml',
    'oauth.conf.yml',
    'other.conf.yml',
    'register.conf.yml',
    'security.conf.yml',
    'session.conf.yml'
];

foreach ($configPaths as $conf)
{
    try
    {
        $contents = Yaml::parseFile(SYSTEM_ROOT . "/config/{$conf}");
        if ($conf == 'cookie.conf.yml') {
            define('COOKIE_CONF', $contents); 
        } elseif ($conf == 'login.conf.yml') {
            define('LOGIN_CONF', $contents);
        } elseif ($conf == 'oauth.conf.yml') {
            define('OAUTH_CONF', $contents);
        } elseif ($conf == 'other.conf.yml') {
            define('OTHER_CONF', $contents);
        } elseif ($conf == 'register.conf.yml') {
            define('REGISTER_CONF', $contents); 
        } elseif ($conf == 'security.conf.yml') {
            define('SECURITY_CONF', $contents); 
        } elseif ($conf == 'session.conf.yml') {
            define('SESSION_CONF', $contents); 
        } else {
            trigger_error(
                '[LOGIN-SYSTEM-ERROR] Could parse all the configuration files.',
                E_USER_ERROR
            ); 
        }
    }
}

/* Configuration loaded. */
