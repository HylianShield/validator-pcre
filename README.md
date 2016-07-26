# HylianShield Validator PCRE

This package extends the HylianShield Validator and implements a PCRE
expression validator.

## Configuration

No additional configuration required

## Expression

The package exposed an Expression entity, which tests if the given
pattern is a valid PCRE pattern and then proceeds to store that pattern.

```php
$expression = new \HylianShield\Validator\Pcre\Expression('/foo/');

echo $expression->getPattern(); // "/foo/"
```

## Expression Validator

The expression validator extends the expression entity and implements
the validator interface.

```php
$validator = new \HylianShield\Validator\Pcre\ExpressionValidator('/foo/');

echo $validator->getPattern(); // "/foo/"
echo $validator->getIdentifier(); // "pcre(/foo/)"

$validator->validate('foo'); // true
$validator->validate('bar'); // false
```
