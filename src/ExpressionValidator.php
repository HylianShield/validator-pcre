<?php
namespace HylianShield\Validator\Pcre;

use HylianShield\Validator\ValidatorInterface;

class ExpressionValidator extends Expression implements ValidatorInterface
{
    /**
     * Get the identifier for the validator.
     *
     * @return string
     */
    public function getIdentifier(): string
    {
        return sprintf(
            'pcre(%s)',
            $this->getPattern()
        );
    }

    /**
     * Validate the given subject.
     *
     * @param mixed $subject
     * @return bool
     */
    public function validate($subject): bool
    {
        return (
            is_string($subject)
            && preg_match($this->getPattern(), $subject)
            && preg_last_error() === PREG_NO_ERROR
        );
    }
}
