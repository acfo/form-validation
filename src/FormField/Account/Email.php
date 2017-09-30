<?php
/**
 * @copyright A. Forster, 2014
 * @link http://www.forster.io/
 **/
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField\Account;

use Acfo\Validation\Form\FormField\Error;
use Acfo\Validation\Form\FormField\Requirement;
use Acfo\Validation\Form\FormField\Text;


/**
 * Email
 *
 * http://www.w3.org/TR/html-markup/input.email.html
 */
class Email extends Text
{
    // TODO get pattern from specification to work
    const PATTERN_EMAIL = '[\w\-\.\+]+@([\w\-]+\.)+[\w]+';

    /**
     * Email constructor.
     *
     * @param string $required
     * @param string $error
     */
    public function __construct(string $required = Requirement::OPTIONAL, string $error = Error::NONE)
    {
        parent::__construct(self::PATTERN_EMAIL, 3, 254, $required, $error);
    }
}
