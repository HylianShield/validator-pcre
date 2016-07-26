<?php
namespace HylianShield\Validator\Pcre;

interface ExpressionInterface
{
    /**
     * Pattern getter.
     *
     * @return string
     */
    public function getPattern() : string;
}
