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
 
namespace Akbarhashmi\Engine;

/**
 * CookieInterface.
 */
interface CookieInterface
{
    
    /**
     * Set the cookie encryption key.
     *
     * @return void.
     */
    function __construct();
    
    /**
     * Store a new cookie.
     *
     * @param string $name   The name of the cookie.
     * @param mixed  $value  The cookie value.
     * @param int    $expire The cookie expiration time.
     *
     * @return void.
     */
    public function store(string $name, $value, int $expire): void;
    
    /**
     * Fetch a cookie by name.
     *
     * @param string $name The name of the cookie.
     *
     * @return mixed The cookie value.
     */
    public function fetch(string $name);
    
    /**
     * Delete a cookie by name.
     *
     * @param string $name The name of the cookie.
     *
     * @return void.
     */
    public function delete(string $name): void;
    
}
