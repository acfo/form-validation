<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField\Search;

use Acfo\Validation\Form\FormField\FormField;
use Acfo\Validation\Form\FormField\Search\SearchString;
use Acfo\Validation\Form\Tests\FormField\FormFieldTestCase;

class SearchStringTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new SearchString();
    }

    public function invalidDataProvider()
    {
        return [
            ['12'], // too short
            [str_repeat('1', 65)], // too long
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
            ['seärch String ']
        ];
    }
}
