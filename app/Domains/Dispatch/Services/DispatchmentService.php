<?php


namespace App\Domains\Dispatch\Services;


use App\Domains\Dispatch\Helpers\PackSizeHelper;
use App\Repositories\PackRepository;
use Illuminate\Support\Collection;

/**
 * Class DispatchmentService
 *
 * @package App\Domains\Dispatch\Services
 */
class DispatchmentService
{
    /**
     * DispatchmentService constructor.
     *
     * @param PackRepository $packRepository
     */
    public function __construct(public PackRepository $packRepository)
    {
    }

    /**
     * @param $amount
     *
     * @return Collection
     */
    public function sendWidgets($amount): Collection
    {
        $packs = $this->packRepository->getAll()->sortByDesc(function ($pack) {
            return $pack->size;
        }
        );
        $smallest = $packs->last()->size;
        $result = collect();
        foreach ($packs as $pack) { // using a ->each would be ugly here, no performance boost neither
            $perPack =
                PackSizeHelper::checkAmountForPack($amount, $pack->size, $smallest);
            if (!$perPack) {
                continue;
            }
            [$amount, $count] = $perPack; //count is to save into the collection, amount is kept for future iteration.
            $result->put($pack->size, $count);

        }
        //return that to a controller and make it nice with inertia
        // perform logic to dispatch the widgets, i believe
        return $result->sortKeys();
    }
}
