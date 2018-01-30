<?php
/**
 * This file is a part of secure-php-login-system.
 *
 * @author Akbar Hashmi (Owner)           <me@akbarhashmi.com>.
 * @author Nicholas English (Contributor) <nenglish0820@outlook.com>
 *
 * @link    <https://github.com/akbarhashmi/Secure-PHP-Login-System> Github repository.
 * @license <https://github.com/akbarhashmi/Secure-PHP-Login-System/blob/master/LICENSE> MIT license.
 */

define('SYSTEM_ROOT', __DIR__);

if (file_exists(SYSTEM_ROOT . '/vendor/autoload.php'))
{
    throw new RuntimeException('You need to run composer install or else the system will not run.');
}

require SYSTEM_ROOT . '/vendor/autoload.php';


