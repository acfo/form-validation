<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField\Account;

use Acfo\Validation\Form\FormField\Account\Email;
use Acfo\Validation\Form\FormField\FormField;
use Acfo\Validation\Form\Tests\FormField\FormFieldTestCase;

class EmailTest extends FormFieldTestCase
{
    protected function getSut(): FormField {
        return new Email();
    }

    public function invalidDataProvider()
    {
        return [
            ['12'], // too short
            [ str_repeat('1', 255) ], // too long
            ['!'],
            ['"'],
            ['§'],
            ['$'],
            ['%'],
            ['&'],
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
            ['foo@bar.com'],
            ['foo@bar.de'],
            ['foo@bar.co.uk']
        ];
    }
}