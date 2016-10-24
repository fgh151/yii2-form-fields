<?php

namespace fgh151\fields\fields;

class FieldTypes
{
    public static function getTypes()
    {
        return [
            1 => 'text',
            2 => 'email',
            3 => 'number',
            4 => 'textarea',
            5 => 'binaryCheckbox',
            6 => 'checkboxList'
        ];
    }
}