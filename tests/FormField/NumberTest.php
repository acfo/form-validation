<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\Tests\FormField;

use Acfo\Validation\Form\FormField\Number;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    private $min;
    private $max;
    private $step;

    public function setUp()
    {
        parent::setUp();
        $this->min = PHP_INT_MIN;
        $this->max = PHP_INT_MAX;
        $this->step = Number::STEP_ANY;
    }

    private function getSut()
    {
        return new Number($this->min, $this->max, $this->step);
    }

    public function testIsValidWithValidNumberAndStepShouldReturnTrue()
    {
        $this->min = 1;
        $this->max = 10;
        $this->step = 2;
        $actual = $this->getSut()->isValid('3');

        $this->assertTrue($actual);
    }

    public function testIsValidWithValueLargerThanMaxShouldReturnFalse()
    {
        $this->min = 0;
        $this->max = 1;
        $this->step = 1;

        $actual = $this->getSut()->isValid('3');

        $this->assertFalse($actual);
    }

    public function testIsValidWithValueSmallerThanMinShouldReturnFalse()
    {
        $this->min = 2;
        $this->max = 3;
        $this->step = 1;

        $actual = $this->getSut()->isValid('1');

        $this->assertFalse($actual);
    }

    public function testIsValidWithIntegerAndDescreteStepShouldReturnTrue()
    {
        $this->min = 0;
        $this->max = 4;
        $this->step = 1;

        $actual = $this->getSut()->isValid('2');

        $this->assertTrue($actual);
    }

    public function testIsValidWithFloatAndDescreteStepShouldReturnFalse()
    {
        $this->min = 0;
        $this->max = 4;
        $this->step = 1;

        $actual = $this->getSut()->isValid('3.5');

        $this->assertFalse($actual);
    }

    public function testGetMinShouldReturn1()
    {
        $this->min = 1;

        $actual = $this->getSut()->getMin();

        $this->assertEquals($this->min, $actual);
    }

    public function testGetMaxShouldReturn42()
    {
        $this->max = 42;

        $actual = $this->getSut()->getMax();

        $this->assertEquals($this->max, $actual);
    }

    public function testGetStepShouldReturn100()
    {
        $this->step = 100;

        $actual = $this->getSut()->getStep();

        $this->assertEquals($this->step, $actual);
    }
}