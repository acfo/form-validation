<?php
declare(strict_types=1);

namespace Acfo\Validation\Form;

interface Form
{
    /**
     * @param array $formData
     * 
     * @return bool
     */
    public function validate(array $formData): bool;
}
