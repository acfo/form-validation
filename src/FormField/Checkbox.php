<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField;

/**
 * Class Checkbox
 *
 * Usage:
 * <input type="hidden" name="exampleCheckbox" value="0" />
 * <input type="checkbox" name="exampleCheckbox" value="1" />
 *
 * @package VisitX\Validation
 */
class Checkbox extends Number
{
    /**
     * Checkbox constructor.
     *
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string $error = Error::NONE)
    {
        parent::__construct(0, 1, 1, $required, $error);
    }
}
