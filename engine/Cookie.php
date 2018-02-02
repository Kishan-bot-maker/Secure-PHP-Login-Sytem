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

use ParagonIE\Halite\
{
    Cookie as CookieController,
    Symmetric\EncryptionKey,
    HiddenString
};

/**
 * Cookie.
 *
 * @codeCoverageIgnore
 */
class Cookie implements CookieInterface
{
    
    /**
     * @var object $cookieController The cookie controller.
     */
    private $cookieController;
    
    /**
     * Set the cookie encryption key.
     *
     * @return void.
     */
    function __construct()
    {
        $this->cookieController = new CookieController(
            new EncryptionKey(
            new HiddenString(
                \SECRET[2]
            )
        ));
    }
    
    /**
     * Store a new cookie.
     *
     * @param string $name   The name of the cookie.
     * @param mixed  $value  The cookie value.
     * @param int    $expire The cookie expiration time.
     *
     * @return void.
     */
    public function store(string $name, $value, int $expire): void
    {
        // Set the cookie securly
        $this->cookieController->store(
            $name,
            $value,
            $expire,
            \COOKIE_PATH,
            \COOKIE_DOMAIN,
            \COOKIE_SECURE,
            \true
        );
    }
    
    /**
     * Fetch a cookie by name.
     *
     * @param string $name The name of the cookie.
     *
     * @return mixed The cookie value.
     */
    public function fetch(string $name)
    {
        // Fetch the cookie.
        return $this->cookieController->fetch($name);
    }
    
    /**
     * Delete a cookie by name.
     *
     * @param string $name The name of the cookie.
     *
     * @return void.
     */
    public function delete(string $name): void
    {
        if (isset($_COOKIE[$name]))
        {
            // Remove the cookie from the cookie global var.
            unset($_COOKIE[$name]);
            // Actual delete the cookie.
            \setcookie(
                $name,
                '',
                \time() - 42000,
                \COOKIE_PATH,
                \COOKIE_DOMAIN,
                \COOKIE_SECURE,
                \true
            );
        }
    }
    
}
