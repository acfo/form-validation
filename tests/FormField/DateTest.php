<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField;

use Acfo\Validation\Form\FormField\Date;
use Acfo\Validation\Form\FormField\FormField;

class DateTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new Date();
    }

    public function invalidDataProvider()
    {
        return [
            [''],
            ['2016-04'],
            ['foob-ar-00'],
            [str_repeat('1', 255)]
        ];
    }

    public function validDataProvider()
    {
        return [
            ['2016-04-13']
        ];
    }
}
