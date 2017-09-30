<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField;

class FormFieldImpl implements FormField
{
    /**
     * @var string
     */
    private $required;

    /**
     * @var string
     */
    private $error;

    /**
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string $error = Error::NONE)
    {
        $this->error = $error;
        $this->required = $required;
    }

    /**
     * @return string
     */
    public function getRequired(): string
    {
        return $this->required;
    }

    /**
     * @param string $required Requirement::REQUIRED or Requirement::OPTIONAL
     */
    public function setRequired(string $required)
    {
        if ($required !== Requirement::REQUIRED && $required !== Requirement::OPTIONAL) {
            throw new \InvalidArgumentException('Expected REQUIRED or OPTIONAL');
        }
        $this->required = $required;
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @param string $error Error::NONE, Error::MISSING, Error::INVALID or Error::REQUIREMENTS
     */
    public function setError(string $error)
    {
        if ($error !== Error::NONE &&
            $error !== Error::MISSING &&
            $error !== Error::INVALID &&
            $error !== Error::REQUIREMENTS
        ) {
            throw new \InvalidArgumentException('Expected NONE, MISSING, INVALID or REQUIREMENTS');
        }
        $this->error = $error;
    }
}
