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
 * DatabaseInterface.
 */
interface DatabaseInterface
{

    /**
     * Create a new PDO database connection.
     * 
     * @param string $driver       The driver to use.
     * @param array  $dnsDetails   The dns details.
     * @param bool   $debugEnabled Should we run debugging.
     *
     * @throws UnexpectedValueException If driver selected does not exist
     *                                  or is not supported.
     *
     * @return void.
     */
    function __construct(string $driver, array $dnsDetails, bool $debugEnabled);
    
    /**
     * Set the debugging state.
     *
     * @param bool $debug Should we run debugging.
     *
     * @return void.
     */
    private function debug(bool $debug): void;
    
    /**
     * Hide the internal contents from view.
     *
     * @return array|[] Return an empty array.
     */
    public function __debugInfo();
    
    /**
     * Prevent serialization.
     *
     * @return array[] Return an empty array.
     */
    public function __sleep(): array;
    
}
