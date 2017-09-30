<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField\Address;

use Acfo\Validation\Form\FormField\Address\ZipCode;
use Acfo\Validation\Form\FormField\FormField;
use Acfo\Validation\Form\Tests\FormField\FormFieldTestCase;

class ZipCodeTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new ZipCode();
    }

    public function invalidDataProvider()
    {
        return [
            ['123'], // too short
            ['12345678901'], // too long
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
            ['?'],
            ['ä'],
            ['ö'],
            ['ü'],
            ['ß'],
            ['Ä'],
            ['Ö'],
            ['Ü'],
        ];
    }

    public function validDataProvider()
    {
        return [
            ['1234'],
            ['ABCDEFGHIJ'],
            ['KLMNOPQRST'],
            ['UVWXYZ5678'],
            ['abcdefghij'],
            ['klmnopqrst'],
            ['uvwxyz90'],
        ];
    }
}
