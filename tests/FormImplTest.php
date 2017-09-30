<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests;

use Acfo\Validation\Form\Form;
use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\FormFieldImpl;
use Acfo\Validation\Form\FormField\Number;
use Acfo\Validation\Form\FormField\Requirement;
use PHPUnit\Framework\TestCase;

class FormImplTest extends TestCase
{
    private $property;

    private function getSut()
    {
        $sut = new TestForm();
        $sut->property = $this->property;
        return $sut;
    }

    public function testValidateWithFormAsPropertyShouldReturnTrue()
    {
        $embeddedFormData = [
            'anotherProperty' => 'abcd'
        ];
        $formData = [
            'property' => $embeddedFormData
        ];
        /** @var Form $form */
        $form = $this->prophesize(Form::class);
        $form
            ->validate($embeddedFormData)
            ->willReturn(true);
        $this->property = $form->reveal();

        $actual = $this->getSut()->validate($formData);

        $this->assertTrue($actual);
    }

    public function testValidateWithNoFormFieldPropertyShouldReturnTrue()
    {
        $formData = [];
        $this->property = 'not a form field';

        $actual = $this->getSut()->validate($formData);

        $this->assertTrue($actual);
    }

    public function testValidateWithMissingPropertyShouldReturnFalseAndSetErrorMissing()
    {
        $formData = [];
        $this->property = new FormFieldImpl(Requirement::REQUIRED);

        $actual = $this->getSut()->validate($formData);

        $this->assertFalse($actual);
        $this->assertEquals(Error::MISSING, $this->property->getError());
    }

    public function testValidateWithInvalidFormDataShouldReturnFalseAndSetErrorMissing()
    {
        $formData = ['property' => 'abcd'];
        $this->property = new Number();

        $actual = $this->getSut()->validate($formData);

        $this->assertFalse($actual);
        $this->assertEquals(Error::INVALID, $this->property->getError());
    }
}
