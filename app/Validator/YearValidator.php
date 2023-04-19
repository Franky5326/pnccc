<?php

namespace Validator;

use Src\Validator\AbstractValidator;

class YearValidator extends AbstractValidator
{

    protected string $message = 'Field :field состоит из 4 цифр';

    public function rule(): bool
    {
        return strlen((string)$this->value) <= 4;
    }
}