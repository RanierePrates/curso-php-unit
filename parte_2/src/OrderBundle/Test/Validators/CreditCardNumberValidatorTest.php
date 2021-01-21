<?php

namespace OrderBundle\Test\Validators;

use OrderBundle\Validators\CreditCardNumberValidator;
use PHPUnit\Framework\TestCase;

class CreditCardNumberValidatorTest extends TestCase {

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $creditCardNumberValidator = new CreditCardNumberValidator($value);
        $isValid = $creditCardNumberValidator->isValid();
        
        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsACreditCard' => [
                'value' => 1478589654587458, 'expectedResult' => true
            ],
            'shouldBeValidWhenValueIsACreditCardAsString' => [
                'value' => '1478589654587458', 'expectedResult' => true
            ],
            'shouldNotBeValidWhenValueIsEmpty' => [
                'value' => '', 'expectedResult' => false
            ],
            'shouldNotBeValidWhenValueIsNotACreditCard' => [
                'value' => '151515', 'expectedResult' => false
            ],
            'shouldNotBeValidWhenValueIsBoolean' => [
                'value' => true, 'expectedResult' => false
            ],
        ];
    }

}