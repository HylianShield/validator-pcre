<?php
namespace HylianShield\Tests\Validator\Pcre;

use HylianShield\Validator\Pcre\ExpressionValidator;

class ExpressionValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The PCRE pattern for the internal test.
     *
     * @var string
     */
    const TEST_PATTERN = '/foo/i';

    /**
     * Test getting the identifier for an expression validator.
     *
     * @return ExpressionValidator
     */
    public function testGetIdentifier(): ExpressionValidator
    {
        $validator = new ExpressionValidator(static::TEST_PATTERN);

        $this->assertEquals(
            sprintf('pcre(%s)', static::TEST_PATTERN),
            $validator->getIdentifier()
        );

        return $validator;
    }

    /**
     * @param ExpressionValidator $validator
     *
     * @return  void
     * @depends testGetIdentifier
     */
    public function testValidate(ExpressionValidator $validator)
    {
        $this->assertTrue($validator->validate('foo'));
        $this->assertFalse($validator->validate('bar'));
    }
}
