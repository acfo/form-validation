<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField\Account;

use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\Requirement;
use Acfo\Validation\Form\FormField\Text;

class Password extends Text
{
    const PASSWORD_REGEX = '^[\w\xC0-\xD6\xD8-\xF6\xF8-\xFF\-\.\'\!\$\%\&\?\#\d ]*$';

    /**
     * Password constructor.
     *
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string $error = Error::NONE)
    {
        parent::__construct(self::PASSWORD_REGEX, 6, 60, $required, $error);
    }
}
