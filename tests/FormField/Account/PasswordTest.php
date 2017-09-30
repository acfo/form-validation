<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField\Account;

use Acfo\Validation\Form\FormField\Account\Password;
use Acfo\Validation\Form\FormField\FormField;
use Acfo\Validation\Form\Tests\FormField\FormFieldTestCase;

class PasswordTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new Password();
    }

    public function invalidDataProvider()
    {
        return [
            ['12345'], // too short
            [str_repeat('1', 61)] // too long
        ];
    }

    public function validDataProvider()
    {
        return [
            ["Paßwört -.'!$%&?# 1234567890"]
        ];
    }
}
