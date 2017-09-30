<?php
declare(strict_types=1);

namespace Acfo\Validation\Form;

use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\FormField;
use Acfo\Validation\Form\FormField\Requirement;

trait FormImpl
{
    /**
     * @param array $formData
     *
     * @return bool
     */
    public function validate(array $formData): bool
    {
        $isOk = true;
        foreach ($this as $propertyName => $property) {
            if ($property instanceof Form) {
                $isOk = $this->validateForm($property, $propertyName, $formData);
                continue;
            }
            if ($property instanceof FormField) {
                $isOk = $this->validateFormField($property, $propertyName, $formData);
                continue;
            }
        }
        return $isOk;
    }

    /**
     * @param Form $property
     * @param string $propertyName
     * @param array $formData
     *
     * @return bool
     */
    private function validateForm(Form $property, string $propertyName, array $formData)
    {
        $embeddedFormData = [];
        if (isset($formData[$propertyName]) && is_array($formData[$propertyName])) {
            $embeddedFormData = $formData[$propertyName];
        }
        return $property->validate($embeddedFormData);
    }

    /**
     * @param FormField $property
     * @param string $propertyName
     * @param array $formData
     *
     * @return bool
     */
    private function validateFormField(FormField $property, string $propertyName, array $formData)
    {
        if (!isset($formData[$propertyName])) {
            if ($property->getRequired() === Requirement::REQUIRED) {
                $property->setError(Error::MISSING);
                return false;
            }
        } else if (!$property->isValid($formData[$propertyName])) {
            $property->setError(Error::INVALID);
            return false;
        }
        return true;
    }
}
