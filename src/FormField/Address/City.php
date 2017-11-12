<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField\Address;

use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\Requirement;
use Acfo\Validation\Form\FormField\Text;

class City extends Text
{
    // CITY_REGEX should match any european city,
    // e.g. "St. Germaine/Untererding, am Speier"
    private const CITY_REGEX = '^[\w\xC0-\xD6\xD8-\xF6\xF8-\xFF\s\-\.\,\'\/]+$';

    /**
     * City constructor.
     *
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string $error = Error::NONE)
    {
        parent::__construct(self::CITY_REGEX, 1, 30, $required, $error);
    }
}
