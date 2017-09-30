<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField;

interface FormField
{
    /**
     * @return string Requirement::REQUIRED or Requirement::OPTIONAL
     */
    public function getRequired(): string;

    /**
     * @param string $required Requirement::REQUIRED or Requirement::OPTIONAL
     */
    public function setRequired(string $required);

    /**
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool;

    /**
     * @return string
     */
    public function getError(): string;

    /**
     * @param string $error Error::NONE, Error::MISSING, Error::INVALID or Error::REQUIREMENTS
     */
    public function setError(string $error);
}
