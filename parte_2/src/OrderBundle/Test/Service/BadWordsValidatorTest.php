<?php

namespace OrderBundle\Validators\Service;

use OrderBundle\Repository\BadWordsRepository;
use OrderBundle\Service\BadWordsValidator;
use PHPUnit\Framework\TestCase;

class BadWordsValidatorTest extends TestCase
{
    /**
    * @test
    * @dataProvider badWordsDataProvider
    */
    public function hasBadWords($text, $expectedResult)
    {
        $badWordsList = ['besta', 'bobo', 'bosta'];
        $badWordsRepository = $this->createMock(BadWordsRepository::class);
        $badWordsRepository->method('findAllAsArray')->willReturn($badWordsList);

        $badWordsValidator = new BadWordsValidator($badWordsRepository);

        $hasBadWords = $badWordsValidator->hasBadWords($text);

        $this->assertEquals($expectedResult, $hasBadWords);
    }

    public function badWordsDataProvider()
    {
        return [
            'shouldBeValidWhenHasBadWords' => [
                'text' => 'Seu restaurante é uma bosta', 'expectedResult' => true
            ],
            'shouldNotBeValidWhenNotHasBadWords' => [
                'text' => 'Seu restaurante é ótimo', 'expectedResult' => false
            ],
            'shouldNotBeValidWhenTextIsEmpty' => [
                'text' => '', 'expectedResult' => false
            ],
        ];
    }

}