<?php

namespace App\Http\Controllers\Api;

class OutputController
{
    private static $errors = [];
    private static $output = [];

    public static function setError($error)
    {
        self::$errors[] = $error;
    }

    public static function getErrors()
    {
        return self::$errors;
    }

    public static function setOutput(string $key, $object)
    {
        self::$output[$key] = $object;
    }

    public static function getOutput()
    {
        return json_encode([
            'errors' => self::$errors,
            'data' => self::$output,
        ]);
    }
}