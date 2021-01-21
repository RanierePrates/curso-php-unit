<?php

namespace OrderBundle\Test\Validators;

use DateTime;
use OrderBundle\Validators\CreditCardExpirationValidator;
use OrderBundle\Validators\CreditCardNumberValidator;
use PHPUnit\Framework\TestCase;

class CreditCardExpirationValidatorTest extends TestCase
{

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $creditCardExpirationDate = new DateTime($value);
        $creditCardExpirationValidator = new CreditCardExpirationValidator($creditCardExpirationDate);
        $isValid = $creditCardExpirationValidator->isValid();
        
        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenDateIsNotExpired' => [
                'value' => '2030-01-01', 'expectedResult' => true
            ],
            'shouldNotBeValidWhenDateIsExpired' => [
                'value' => '2020-10-01', 'expectedResult' => false
            ],
            'shouldNotBeValidWhenValueIsEmpty' => [
                'value' => '', 'expectedResult' => false
            ]
        ];
    }

}