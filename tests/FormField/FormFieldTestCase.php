<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField;

use Acfo\Validation\Form\FormField\FormField;
use PHPUnit\Framework\TestCase;

abstract class FormFieldTestCase extends TestCase
{
    abstract protected function getSut(): FormField;

    /**
     * @dataProvider invalidDataProvider
     *
     * @param $value
     */
    public function testSetValueWithInvalidValueShouldReturnFalse($value)
    {
        $actual = $this->getSut()->isValid($value);

        $this->assertFalse($actual);
    }

    abstract public function invalidDataProvider();

    /**
     * @dataProvider validDataProvider
     *
     * @param $value
     */
    public function testSetValueWithValidValueShouldReturnTrue($value)
    {
        $actual = $this->getSut()->isValid($value);

        $this->assertTrue($actual);
    }

    abstract public function validDataProvider();
}
