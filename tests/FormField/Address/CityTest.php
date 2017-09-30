<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField\Address;

use Acfo\Validation\Form\FormField\Address\City;
use Acfo\Validation\Form\FormField\FormField;
use Acfo\Validation\Form\Tests\FormField\FormFieldTestCase;

class CityTest extends FormFieldTestCase
{
    protected function getSut(): FormField
    {
        return new City();
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
            ['St. Andreasberg'],
            ['Dessau-Roßlau'],
            ['Görlitz'],
            ['Mährisch-Ostrau'],
            ['Brünn'],
            ['Weiden in der Oberpfalz'],
            ['Würzburg']
        ];
    }
}
