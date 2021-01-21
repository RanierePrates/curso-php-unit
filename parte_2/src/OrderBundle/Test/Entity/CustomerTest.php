<?php

namespace OrderBundle\Test\Entity;

use OrderBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{

    /**
     * @dataProvider customerAllowedProvider
     */
    public function testIsAllowerdToOrder($isActive, $isBlocked, $expectedAllowed)
    {
        $customer = new Customer(
            $isActive,
            $isBlocked,
            'Raniere Prates',
            '+5511958746932'
        );

        $isAllowed = $customer->isAllowedToOrder();

        $this->assertEquals($expectedAllowed, $isAllowed);
    }

    public function customerAllowedProvider()
    {
        return [
            'shouldBeAllowedWhenIsActiveAndNotBlocked' => [
                'isActive' => true,
                'isBlocked' => false,
                'expectedAllowed' => true
            ],
            'shouldNotBeAllowedWhenIsActiveButIsBlocked' => [
                'isActive' => true,
                'isBlocked' => true,
                'expectedAllowed' => false
            ],
            'shouldNotBeAllowedWhenIsNotActive' => [
                'isActive' => false,
                'isBlocked' => false,
                'expectedAllowed' => false
            ],
            'shouldNotBeAllowedWhenIsNotActiveAndIsBlocked' => [
                'isActive' => false,
                'isBlocked' => false,
                'expectedAllowed' => false
            ]
        ];
    }

}