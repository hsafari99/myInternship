<?php

namespace App\Traits;

trait Translatable
{
    /**
     * Look for the right translation inside a table.
     * 
     * @param string $lang
     * @return string
     */

    public function str()
    { 
        $lang = App::getLocale();
        return $this->$lang;
    }
}