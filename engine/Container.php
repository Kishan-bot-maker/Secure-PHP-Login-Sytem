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

use Nenglish7\Percel\Container as PercelContainer;

/**
 * Container.
 */
class Container
{
    
    /**
     * @var object $instance The percel container instance.
     */
    private static $instance = \null;
    
    /**
     * Set the container
     *
     * @param object|PercelContainer The percel container.
     *
     * @return void.
     */
    public static function setContainer(PercelContainer $percelContaner): void
    {
        // Set the container instance.
        self::$instance = $percelContaner;
    }
    
    /**
     * Get the container instance.
     *
     * @throws InvalidArgumentException If the container is not an instance of the
     *                                  percel container. 
     *
     * @return object|PercelContainer Return the container instance.
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof PercelContainer))
        {
            throw new Exception\InvalidArgumentException('The container is not an instance of the percel container.');
        }
        // Get the container.
        return self::$instance;
    }
    
    /**
     * Clear the container cache.
     *
     * @return void.
     * 
     * @codeCoverageIgnore
     */
    public static function clear(): void
    {
        // Clear the cache.
        self::$instance = \null;
    }
    
}
