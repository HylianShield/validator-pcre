<?php
namespace HylianShield\Tests\Validator\Pcre;

use HylianShield\Validator\Pcre\Expression;

class ExpressionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test a valid pattern.
     *
     * @return Expression
     */
    public function testValidPattern(): Expression
    {
        return new Expression('/foo/i');
    }

    /**
     * Test getting the pattern from the expression.
     *
     * @param Expression $expression
     *
     * @return  string
     * @depends testValidPattern
     */
    public function testGetPattern(Expression $expression): string
    {
        return $expression->getPattern();
    }

    /**
     * Test that the constructor throws when a pattern with invalid delimiter
     * is supplied.
     *
     * @return                   void
     * @expectedException        \HylianShield\Validator\Pcre\InvalidPatternException
     * @expectedExceptionMessage Delimiter must not be alphanumeric or backslash. Encountered: F
     */
    public function testInvalidDelimiter()
    {
        new Expression('Foo');
    }

    /**
     * Test that the constructor throws when the ending delimiter is missing.
     *
     * @return                   void
     * @expectedException        \HylianShield\Validator\Pcre\InvalidPatternException
     * @expectedExceptionMessage No ending delimiter found for: |
     */
    public function testMissingEndingDelimiter()
    {
        new Expression('|Foo/');
    }
}
