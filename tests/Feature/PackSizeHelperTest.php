<?php


use App\Domains\Dispatch\Helpers\PackSizeHelper;

class PackSizeHelperTest extends \Tests\TestCase
{
    /**
     *
     */
    public function testHelperHandlesOversizePacks()
    {
        [$amount, $count] = PackSizeHelper::checkAmountForPack(4000, 5000, 2000);
        $this->assertTrue($amount === 0);
        $this->assertTrue($count === 1);
    }

    /**
     *
     */
    public function testHelperKnowsNotToGoTooBig()
    {
        [$amount, $count] = PackSizeHelper::checkAmountForPack(4000, 5000, 250);
        $this->assertTrue($amount === null);
        $this->assertTrue($count === null);
    }

    /**
     *
     */
    public function testHelperKnowsHowToDivide()
    {
        [$amount, $count] = PackSizeHelper::checkAmountForPack(4000, 500, 250);
        $this->assertTrue($amount === 0);
        $this->assertTrue($count === 8);
    }

    /**
     *
     */
    public function testHelperKnowsHowToReturnARemainder()
    {
        [$amount, $count] = PackSizeHelper::checkAmountForPack(4050, 500, 250);
        $this->assertTrue($amount === 50);
        $this->assertTrue($count === 8);
    }
}
