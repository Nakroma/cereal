<?php

namespace Nakroma;


/**
 * Class Cereal
 * @package Nakroma
 */
class Cereal
{
    /**
     * Generates a random key
     * @param array $params
     * @return string
     */
    public static function generate($params = [])
    {
        // Default parameters
        $defaults = [
            'length' => strlen(self::getKey()),
            'delimiter' => '-',
            'delimiterSpacing' => 4,
            'uppercase' => true,
            'numbers' => true,
            'chars' => true,
        ];
        $params = array_merge($defaults, $params);

        // Generate string
        $str = self::getKey();

        // Cut/extend length
        if ($params['length'] < $defaults['length']) {
            $str = substr($str, 0, $params['length']);
        } else if ($params['length'] > $defaults['length']) {
            for ($i = $defaults['length']; $i < $params['length']; $i += $defaults['length']) {
                $new = substr(self::getKey(), 0, $params['length'] - $i);
                $str .= $new;
            }
        }

        // Replace numbers/chars
        if (!$params['numbers']) {
            $str = preg_replace_callback('/\d/', function(){
                return chr(mt_rand(97, 122)); // Random char
            }, $str);
        }
        if (!$params['chars']) {
            $str = preg_replace_callback('/[a-zA-Z]/', function(){
                return mt_rand(0, 9);
            }, $str);
        }

        // Add delimiters
        $str = chunk_split($str, $params['delimiterSpacing'], $params['delimiter']);
        $str = rtrim($str, $params['delimiter']);

        // Uppercase
        if ($params['uppercase']) {
            $str = strtoupper($str);
        }

        return $str;
    }

    /**
     * Generates the unique base key
     * @return string
     */
    private static function getKey()
    {
        return md5(uniqid(session_id().rand(), true));
    }
}

//$key = Cereal::generate(['delimiter' => '', 'length' => 128]);
//echo $key . " --- " .strlen($key);