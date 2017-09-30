<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField;

use Acfo\Validation\Form\FormField\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    private $pattern;
    private $minLength;
    private $maxLength;

    public function setUp()
    {
        parent::setUp();
        $this->pattern = '\w+';
        $this->minLength = -1;
        $this->maxLength = -1;
    }

    private function getSut()
    {
        return new Text(
            $this->pattern,
            $this->minLength,
            $this->maxLength
        );
    }

    public function testIsValidWithValidValueShouldReturnTrue()
    {
        $actual = $this->getSut()->isValid('test');

        $this->assertTrue($actual);
    }

    public function testIsValidWithValueTooShortShouldReturnFalse()
    {
        $this->minLength = 2;

        $actual = $this->getSut()->isValid('t');

        $this->assertFalse($actual);
    }

    public function testIsValidWithValueTooLongShouldReturnFalse()
    {
        $this->maxLength = 3;

        $actual = $this->getSut()->isValid('test');

        $this->assertFalse($actual);
    }

    public function testGetPatternShouldReturnPattern()
    {
        $this->pattern = 'pattern';

        $actual = $this->getSut()->getPattern();

        $this->assertEquals($this->pattern, $actual);
    }

    public function testGetMinLengthShouldReturn1()
    {
        $this->minLength = 1;

        $actual = $this->getSut()->getMinLength();

        $this->assertEquals($this->minLength, $actual);
    }

    public function testGetMaxLengthShouldReturn42()
    {
        $this->maxLength = 42;

        $actual = $this->getSut()->getMaxLength();

        $this->assertEquals($this->maxLength, $actual);
    }
}
