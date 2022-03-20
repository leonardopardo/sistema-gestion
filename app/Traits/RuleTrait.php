<?php


namespace App\Traits;


trait RuleTrait
{
    /**
     * @return array
     */
    protected static function getRules():array
    {
        return self::$rules;
    }

    /**
     * @return array
     */
    protected static function popRules():array
    {
        $args = func_get_args();

        $rules = self::$rules;

        foreach($args as $arg)
        {
            if(isset($rules[$arg]) && $rules[$arg])
                unset($rules[$arg]);
        }

        return $rules;
    }
}
