<?php

namespace Ezadev\Simplemde;

use Ezadev\Admin\Extension;

class Simplemde extends Extension
{
    public $name = 'simplemde';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';
}