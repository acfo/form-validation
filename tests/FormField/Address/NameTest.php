<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField\Address;

use Acfo\Validation\Form\FormField\Address\Name;
use Acfo\Validation\Form\FormField\FormField;
use Acfo\Validation\Form\Tests\FormField\FormFieldTestCase;

class NameTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new Name();
    }

    public function invalidDataProvider()
    {
        return [
            [''], // too short
            ['123456789012345678901234567890123456'], // too long
            ['!'],
            ['"'],
            ['§'],
            ['$'],
            ['%'],
            ['&'],
            ['/'],
            ['\\'],
            ['('],
            [')'],
            ['='],
            ['?']
        ];
    }

    public function validDataProvider()
    {
        return [
            ['John']
        ];
    }
}
