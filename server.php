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

define('SYSTEM_ROOT', __DIR__);

if (!file_exists(SYSTEM_ROOT . '/vendor/autoload.php')) {
    trigger_error('[LOGIN-SYSTEM-ERROR] You need the required packages installed.', E_USER_ERROR);
}

require_once SYSTEM_ROOT . '/vendor/autoload.php';
require_once SYSTEM_ROOT . '/config/preload.php';

$container = new Pimple\Container();

$container['database'] = function() {
    $db = new Akbarhashmi\Engine\Database(
        DATABASE_CONF['driver'],
        DATABASE_CONF['dnsDetails'],
        MAIN_CONF['debugEnabled']
    );
    return $db;
};
