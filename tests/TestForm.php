<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests;

use Acfo\Validation\Form\Form;
use Acfo\Validation\Form\FormImpl;

class TestForm implements Form
{
    use FormImpl;

    public $property;
}
