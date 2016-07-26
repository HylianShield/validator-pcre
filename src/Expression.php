<?php
namespace HylianShield\Validator\Pcre;

class Expression implements ExpressionInterface
{
    /**
     * The PCRE pattern.
     *
     * @var string
     */
    private $pattern;

    /**
     * Expression constructor.
     *
     * @param string $pattern
     *
     * @throws InvalidPatternException When the given pattern is not a valid
     *   PCRE pattern.
     */
    public function __construct(string $pattern)
    {
        // The first character will be the delimiter.
        $delimiter = mb_substr($pattern, 0, 1);

        if (preg_match('/[a-z0-9\\\\]/i', $delimiter)) {
            throw new InvalidPatternException(
                'Delimiter must not be alphanumeric or backslash. Encountered: '
                . $delimiter
            );
        }

        // Detect if the ending delimiter was found, excluding escaped delimiters
        // using a negative look behind.
        if (!preg_match(
            '/(?<!\\\\)' . "\\" . $delimiter . '/',
            mb_substr($pattern, 1)
        )) {
            throw new InvalidPatternException(
                'No ending delimiter found for: ' . $delimiter
            );
        }

        $this->pattern = $pattern;
    }

    /**
     * Pattern getter.
     *
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }
}
