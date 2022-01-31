<?php


namespace Core\MkyCompiler\MkyDirectives;


use Core\MkyCompiler\MkyEngineException;

class Directive
{
    private static array $variables = [];

    public function getRealVariable($value)
    {
        $key = array_search($value, self::$variables, true);
        unset(self::$variables[$key]);
        return $key;
    }

    public static function setRealVariable($variable, $value)
    {
        self::$variables[$variable] = $value;
    }
}