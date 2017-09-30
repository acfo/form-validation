<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField;

use Acfo\Validation\Form\FormField\ConstListItem;
use Acfo\Validation\Form\FormField\FormField;

class ConstListItemTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new ConstListItem(TestConstList::class);
    }

    public function invalidDataProvider()
    {
        return [
            [''],
            ['blabla']
        ];
    }

    public function validDataProvider()
    {
        return [
            ['foo'],
            ['bar']
        ];
    }
}
