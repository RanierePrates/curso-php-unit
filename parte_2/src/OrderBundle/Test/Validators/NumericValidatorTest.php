<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\NumericValidator;
use PHPUnit\Framework\TestCase;

class NumericValidatorTest extends TestCase {

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $numericValidator = new NumericValidator($value);
        $isValid = $numericValidator->isValid();
        
        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsNumeric' => ['value' => 10, 'expectedResult' => true],
            'shouldBeValidWhenValueIsNumericString' => ['value' => '10', 'expectedResult' => true],
            'shouldNotBeValidWhenValueIsEmpty' => ['value' => '', 'expectedResult' => false],
            'shouldNotBeValidWhenValueIsString' => ['value' => 'foo', 'expectedResult' => false],
            'shouldNotBeValidWhenValueIsBoolean' => ['value' => true, 'expectedResult' => false],
        ];
    }

}