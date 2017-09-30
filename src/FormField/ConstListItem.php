<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField;

class ConstListItem extends ListItem
{
    /**
     * ConstListItem constructor.
     *
     * @param string $class
     * @param string $required
     * @param string $error
     */
    public function __construct(
        string $class,
        string $required = Requirement::OPTIONAL,
        string $error = Error::NONE
    ) {
        $constants = (new \ReflectionClass($class))->getConstants();
        parent::__construct($constants, $required, $error);
    }
}
