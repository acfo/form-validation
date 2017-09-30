<?php
/**
 * @copyright A. Forster, 2014
 * @link http://www.forster.io
 **/
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField;

/**
 * Number
 *
 * http://www.w3.org/TR/html-markup/input.number.html
 */
class Number extends FormFieldImpl
{
    const STEP_ANY = 'any'; // the value of 'any' on the HTML5 step attribute is needed to allow any float values
    /**
     * min
     *
     * @var mixed
     */
    private $min;
    /**
     * max
     *
     * @var mixed
     */
    private $max;
    /**
     * step
     *
     * @var mixed
     */
    private $step;

    /**
     * @param float $min
     * @param float $max
     * @param mixed $step 'any' or float value
     * @param string $required
     * @param string $error
     */
    public function __construct(
        float $min = PHP_INT_MIN,
        float $max = PHP_INT_MAX,
        $step = self::STEP_ANY,
        string $required = Requirement::OPTIONAL,
        string $error = Error::NONE
    ) {
        parent::__construct($required, $error);
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool
    {
        if (!is_numeric($value) ||
            $value < $this->min ||
            $value > $this->max ||
            $this->step !== self::STEP_ANY && !$this->isValueMultipleOfStep($value, $this->step)
        ) {
            return false;
        }
        return parent::isValid($value);
    }

    /**
     * @return string min value or empty string
     */
    public function getMin()
    {
        return (string)$this->min;
    }

    /**
     * @return string max value or empty string
     */
    public function getMax()
    {
        return (string)$this->max;
    }

    /**
     * @return mixed if step is not set to STEP_ANY, setValue only accepts multiples of step
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param mixed $value
     * @param mixed $step
     *
     * @return bool
     */
    private function isValueMultipleOfStep($value, $step)
    {
        $offset = $value - $this->min;
        if ($offset == (int)$offset && is_int($step)) {
            return ($offset % $step) == 0;
        }
        // TODO decide if 4 digit accuracy is sufficient. Use step size?
        return abs(($offset / $step) - round($offset / $step, 0)) < 0.0001;
    }
}
