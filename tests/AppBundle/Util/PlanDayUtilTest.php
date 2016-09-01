<?php

namespace Tests\AppBundle\Util;

use AppBundle\Entity\PlanDay;
use AppBundle\Util\PlanDayUtil;

class PlanDayUtilTest extends \PHPUnit_Framework_TestCase
{
    public function testSortsCorrectly()
    {
        $planDayUtil = new PlanDayUtil([]);
        $sortedArray = [
            '2015' => [
                '12' => [
                    '01' => '',
                    '05' => '',
                    '03' => '',
                ],
                '3' => [
                    '02' => '',
                    '12' => ''
                ],
                '4' => [
                    '10' => ''
                ]
            ],
            '2016' => []
        ];
        $planDayUtil->krsortRecursive($sortedArray);

        $expected = [
            '2016' => [],
            '2015' => [
                '12' => [
                    '05' => '',
                    '03' => '',
                    '01' => '',
                ],
                '4' => [
                    '10' => ''
                ],
                '3' => [
                    '12' => '',
                    '02' => '',
                ],
            ],
        ];

        $this->assertEquals($expected, $sortedArray);
    }

    public function testSumsCorrectly()
    {
        $planDayUtil = new PlanDayUtil([
            $mock1 = $this->generateMock("2016-01-01"),
            $mock2 = $this->generateMock("2016-01-01"),
            $mock3 = $this->generateMock("2016-01-02"),
            $mock4 = $this->generateMock("2015-01-12")
        ]);

        $this->assertEquals([
            '2016' => [
                '01' => [
                    '01' => [
                        $mock1,
                        $mock2
                    ],
                    '02' => [
                        $mock3
                    ]
                ]
            ],
            '2015' => [
                '01' => [
                    '12' => [
                        $mock4
                    ]
                ]
            ]
        ], $planDayUtil->separateByTimeline());
    }

    /**
     * @param String $date
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function generateMock($date)
    {
        $planDay = $this->getMock(PlanDay::class);
        $planDay->expects($this->any())
            ->method("getDate")
            ->willReturn(new \DateTime($date));

        return $planDay;
    }
}