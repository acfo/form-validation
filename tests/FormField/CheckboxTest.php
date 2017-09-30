<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField;

use Acfo\Validation\Form\FormField\Checkbox;
use Acfo\Validation\Form\FormField\FormField;

class CheckboxTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new Checkbox();
    }

    public function invalidDataProvider()
    {
        return [
            [''],
            ['foobar'],
            ['-1'],
            ['1.5']
        ];
    }

    public function validDataProvider()
    {
        return [
            ['0'],
            ['1']
        ];
    }
}
