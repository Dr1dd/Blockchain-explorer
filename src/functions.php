<?php

declare(strict_types=1);

namespace Denpa\Bitcoin;

use Denpa\Bitcoin\Exceptions\BadConfigurationException;
use Denpa\Bitcoin\Exceptions\Handler as ExceptionHandler;

if (!function_exists('to_bitcoin')) {
    /**
     * Converts from satoshi to bitcoin.
     *
     * @param int $satoshi
     *
     * @return string
     */
}

if (!function_exists('to_satoshi')) {
    /**
     * Converts from bitcoin to satoshi.
     *
     * @param string|float $bitcoin
     *
     * @return string
     */
  
}

if (!function_exists('to_ubtc')) {
    /**
     * Converts from bitcoin to ubtc/bits.
     *
     * @param string|float $bitcoin
     *
     * @return string
     */

}

if (!function_exists('to_mbtc')) {
    /**
     * Converts from bitcoin to mbtc.
     *
     * @param string|float $bitcoin
     *
     * @return string
     */
  
}

if (!function_exists('to_fixed')) {
    /**
     * Brings number to fixed precision without rounding.
     *
     * @param string $number
     * @param int    $precision
     *
     * @return string
     */
    // function to_fixed(string $number, int $precision = 8) : string
    // {
    //     $number = bcmul($number, (string) pow(10, $precision));

    //     return bcdiv($number, (string) pow(10, $precision), $precision);
    // }
}

if (!function_exists('split_url')) {
    /**
     * Splits url into parts.
     *
     * @param string $url
     *
     * @return array
     */
    // function split_url(string $url) : array
    // {
    //     $allowed = ['scheme', 'host', 'port', 'user', 'pass'];

    //     $parts = (array) parse_url($url);
    //     $parts = array_intersect_key($parts, array_flip($allowed));

    //     if (!$parts || empty($parts)) {
    //         throw new BadConfigurationException(
    //             ['url' => $url],
    //             'Invalid url'
    //         );
    //     }

    //     return $parts;
    // }
}

if (!function_exists('exception')) {
    /**
     * Gets exception handler instance.
     *
     * @return \Denpa\Bitcoin\Exceptions\Handler
//      */
//     function exception() : ExceptionHandler
//     {
//         return ExceptionHandler::getInstance();
//     }
}

set_exception_handler([ExceptionHandler::getInstance(), 'handle']);
