<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField;

class ListItem extends FormFieldImpl
{
    /**
     * @var array
     */
    private $list;

    /**
     * @param array $list
     * @param string $required
     * @param string $error
     */
    public function __construct(
        array $list,
        string $required = Requirement::OPTIONAL,
        string $error = Error::NONE
    ) {
        parent::__construct($required, $error);
        $this->list = $list;
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool
    {
        if (!in_array($value, $this->getList())) {
            return false;
        }
        return parent::isValid($value);
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }
}
