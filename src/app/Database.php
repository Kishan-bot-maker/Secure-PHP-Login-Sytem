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

namespace Akbarhashmi\Engine\Database;

use PDOException;
use PDO;

/**
 * PDOConnect.
 */
class PDOConnect extends PDO implements DatabaseInterface
{
    
    /**
     * @var array|[
     *     'mysql',
     *     'pgsql'
     * ] $drivers The list of avaliable drivers. 
     */
    private $drivers = [
        'mysql',
        'pgsql'
    ];
    
    /**
     * @var bool $debug Should we run debugging.
     */
    protected $debug = \false;

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
    function __construct(string $driver, array $dnsDetails, bool $debugEnabled)
    {
        $driver = \trim($driver);
        if (!$this->validateDriver($driver))
        {
            throw new Exception\UnexpectedValueException(\sprintf(
                'The driver selected does not exist or is not supported. Passed: "%s"',
                \convertfso($driver)
            ));  
            
        }
        try
        {
            parent::__construct(
                "{$driver}:host={$dnsDetails['host']};port={$dnsDetails['port']};dbname={$dnsDetails['dbname']}",
                $dnsDetails['user'],
                $dnsDetails['pass']
            );
            $this->debug($debugEnabled);
            if ($this->debug)
            {
                $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e)
        {
            if (!$debugEnabled)
            {
                die('Connection failed: [%private-data%]');
            }
            die('Connection failed: ' . $e->getMessage());
        }
    }
    
    /**
     * Set the debugging state.
     *
     * @param bool $debug Should we run debugging.
     *
     * @return void.
     */
    private function debug(bool $debug): void
    {
        $this->debug = $debug;
    }
    
    /**
     * Hide the internal contents from view.
     *
     * @return array|[] Return an empty array.
     */
    public function __debugInfo()
    {
        return [];
    }
    
    /**
     * Prevent serialization.
     *
     * @return array[] Return an empty array.
     */
    public function __sleep(): array
    {
        return [];
    }
    
    /**
     * Validate the PDO driver.
     *
     * @param string $driver The driver to validate.
     *
     * @return bool Return TRUE if the driver is valid and return FALSE
     *              if the driver is invalid.
     */
    private function validateDriver(string $driver): bool
    {
        return \in_array($driver, $this->drivers, \true);
    }
    
}
