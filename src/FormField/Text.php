<?php
declare(strict_types=1);

namespace Acfo\Validation\Form\FormField;

/**
 * Text
 *
 * see http://www.w3.org/TR/html-markup/input.text.html
 */
class Text extends FormFieldImpl
{
    /**
     * @var string
     */
    private $pattern;
    /**
     * @var int
     */
    private $minLength;
    /**
     * @var int
     */
    private $maxLength;

    /**
     * __construct
     *
     * @param string $pattern declare requirements for validation using PHP and HTML5 compatible regular expressions.
     * @param int $minLength minimum number of characters, set -1 to disable check.
     * @param int $maxLength maximum number of characters, set -1 to disable check.
     * @param string $required
     * @param string $error
     */
    public function __construct(
        string $pattern,
        int $minLength = -1,
        int $maxLength = -1,
        string $required = Requirement::OPTIONAL,
        string $error = Error::NONE
    ) {
        parent::__construct($required, $error);
        $this->pattern = $pattern;
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool
    {
        if ($this->minLength != -1 && strlen($value) < $this->minLength ||
            $this->maxLength != -1 && strlen($value) > $this->maxLength ||
            !preg_match('/' . $this->pattern . '/u', $value)
        ) {
            return false;
        }
        return parent::isValid($value);
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @return int
     */
    public function getMaxLength()
    {
        return $this->maxLength;
    }

    /**
     * @return int
     */
    public function getMinLength()
    {
        return $this->minLength;
    }
}
