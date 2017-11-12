<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField\Address;

use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\Requirement;
use Acfo\Validation\Form\FormField\Text;

class Name extends Text
{
    private const NAME_REGEX = '^[\w\xC0-\xD6\xD8-\xF6\xF8-\xFF\-\.\' ]*$';

    /**
     * Name constructor.
     *
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string $error = Error::NONE)
    {
        // see UK Government Data Standards Catalogue
        parent::__construct(self::NAME_REGEX, 1, 35, $required, $error);
    }
}
