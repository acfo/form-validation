<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField\Address;

use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\Requirement;
use Acfo\Validation\Form\FormField\Text;

class ZipCode extends Text
{
    const ZIP_CODE_REGEX = '^[a-zA-Z0-9]+$';

    /**
     * ZipCode constructor.
     *
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string  $error = Error::NONE)
    {
        parent::__construct(self::ZIP_CODE_REGEX, 4, 10, $required, $error);
    }
}
