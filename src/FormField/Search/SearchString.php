<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField\Search;

use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\Requirement;
use Acfo\Validation\Form\FormField\Text;

class SearchString extends Text
{
    const SEARCH_STRING_REGEX = '^[\w\xC0-\xD6\xD8-\xF6\xF8-\xFF\s\-\.\,\'\/#\d]*$';

    /**
     * SearchString constructor.
     *
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string $error = Error::NONE)
    {
        parent::__construct(self::SEARCH_STRING_REGEX, 3, 64, $required, $error);
    }
}
