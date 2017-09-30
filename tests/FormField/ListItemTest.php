<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField;

use Acfo\Validation\Form\FormField\FormField;
use Acfo\Validation\Form\FormField\ListItem;

class ListItemTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new ListItem(['foo', 'bar']);
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