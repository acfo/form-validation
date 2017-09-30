<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField;

interface Error
{
    public const NONE = '';
    public const MISSING = 'error missing';
    public const INVALID = 'error invalid';
    public const REQUIREMENTS = 'error requirements';
}