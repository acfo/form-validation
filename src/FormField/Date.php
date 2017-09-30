<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField;

/**
 * full-date, see http://tools.ietf.org/html/rfc3339
 */
class Date extends Text
{
    const PATTERN_RFC3339_FULLDATE = '^\d\d\d\d-\d\d-\d\d$';

    /**
     * Date constructor.
     *
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string $error = Error::NONE)
    {
        parent::__construct(self::PATTERN_RFC3339_FULLDATE, 10, 10, $required, $error);
    }
}
