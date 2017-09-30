<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField;

use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\FormFieldImpl;
use Acfo\Validation\Form\FormField\Requirement;
use PHPUnit\Framework\TestCase;

class FormFieldImplTest extends TestCase
{
    private function getSut()
    {
        return new FormFieldImpl();
    }

    public function testIsValidShouldReturnTrue()
    {
        $actual = $this->getSut()->isValid('');

        $this->assertTrue($actual);
    }

    public function testGetErrorWithDefaultShouldReturnErrorNone()
    {
        $actual = $this->getSut()->getError();

        $this->assertEquals(Error::NONE, $actual);
    }

    public function testGetRequiredWithDefaultShouldReturnRequirementOptional()
    {
        $actual = $this->getSut()->getRequired();

        $this->assertEquals(Requirement::OPTIONAL, $actual);
    }

    public function testSetError()
    {
        $sut = $this->getSut();
        $expected = Error::INVALID;
        $sut->setError($expected);
        $actual = $sut->getError();

        $this->assertEquals($expected, $actual);
    }

    public function testSetErrorWithInvalidValueShouldThrowInvalidArgumentException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->getSut()->setError('foobar');
    }

    public function testSetRequired()
    {
        $sut = $this->getSut();
        $expected = Requirement::REQUIRED;
        $sut->setRequired($expected);
        $actual = $sut->getRequired();

        $this->assertEquals($expected, $actual);
    }

    public function testSetRequiredWithInvalidValueShouldThrowInvalidArgumentException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->getSut()->setRequired('foobar');
    }
}
