<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as BaseModelMakeCommand;

class ModelMakeCommand extends BaseModelMakeCommand
{
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Models';
    }
}
