<?php

namespace App\Http\Controllers;

use Babylon\Repositories\StateRepository;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Babylon\Repositories\StateRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, StateRepository $repository)
    {
        // todo get from request
//        $ids = State::query()->select(['id'])->get()->pluck(['id'])->toArray();
        $ids = [1, 2];
        $dtoSet = $repository->getEntityDTOSet($ids);

        return response()->json($dtoSet->dtoSet);
    }
}
