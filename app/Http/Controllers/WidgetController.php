<?php


namespace App\Http\Controllers;


use App\Domains\Dispatch\Services\DispatchmentService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class WidgetController
 *
 * @package App\Http\Controllers
 */
class WidgetController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Home');
    }

    /**
     * @param Request             $request
     * @param DispatchmentService $service
     *
     * @return Response
     */
    public function getPacks(Request $request, DispatchmentService $service): Response
    {
        $amount = $request->validate(['amount' => ['numeric']])['amount'];
        $packs = $service->sendWidgets($amount)->toArray();
        return Inertia::render('Home', ['packs' => $packs]); // better name it than think what it is
    }
}
