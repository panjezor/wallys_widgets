<?php


use App\Domains\Dispatch\Services\DispatchmentService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class DispatchmentTest
 */
class DispatchmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @throws BindingResolutionException
     */
    public function testGuysAtStickeeWillBeHappyToSee()
    {
        (new \Database\Seeders\PackSeeder())->run();
        /** @var DispatchmentService $service */
        $service = app()->make(DispatchmentService::class);
        $numberOfWidgetsOrdered = collect([1, 250, 251, 501, 12001]);
        $edgeCasesThatHelpedMeDebug = collect([3750, 3751, 4750, 4751]);
        $widgetSets = $numberOfWidgetsOrdered->merge($edgeCasesThatHelpedMeDebug);
        $expectedResponses = collect([[250 => 1], [250 => 1], [500 => 1], [250 => 1, 500 => 1], [  250 => 1,2000 => 1,5000 => 2,]]);
        $debugExpectedResponses = collect([[250 => 1, 500 => 1, 1000 => 1, 2000 => 1], [2000 => 2], [250 => 1, 500 => 1, 2000 => 2], [5000 => 1]]);
        $responseArray = $expectedResponses->merge($debugExpectedResponses);
        foreach ($widgetSets as $key => $widgetSet) {
            $this->assertTrue($service->sendWidgets($widgetSet)->toArray() === $responseArray[$key]);
        }

    }
}
