<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField\Address;

use Acfo\Validation\Form\FormField\Address\Street;
use Acfo\Validation\Form\FormField\FormField;
use Acfo\Validation\Form\Tests\FormField\FormFieldTestCase;

class StreetTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new Street();
    }

    public function invalidDataProvider()
    {
        return [
            [''], // too short
            ['1234567890123456789012345678901'], // too long
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
            ['Max-Planck-Straße 9'],
            ['345 Avenue Fortuné Ferrini'],
            ['Hauptstr. 123'],
        ];
    }
}
