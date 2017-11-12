<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField\Address;

use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\Requirement;
use Acfo\Validation\Form\FormField\Text;

class Street extends Text
{
    // STREET_REGEX should match any european street or house name,
    // e.g. "12 Rue St Germaine", #10 Downing str", "Mustr. 12a-d", "The Darling Cottage"
    private const STREET_REGEX = '^[\w\xC0-\xD6\xD8-\xF6\xF8-\xFF\s\-\.\,\'\/#\d]*$';

    /**
     * Street constructor.
     *
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string $error = Error::NONE)
    {
        parent::__construct(self::STREET_REGEX, 3, 30, $required, $error);
    }
}
