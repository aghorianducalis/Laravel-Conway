<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConwayCreateRequest;
use Babylon\Repositories\CellStateRepository;
use Illuminate\Http\Request;

class CellStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Babylon\Repositories\CellStateRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, CellStateRepository $repository)
    {
        /** @var int|null $generation */
        $generation = $request->generation ?? 1;

        $dtoSet = $repository->getEntityDTOSetByGeneration($generation);

        return response()->json($dtoSet->dtoSet);
    }

    /**
     * Save a set of the cell states.
     *
     * @param \App\Http\Requests\ConwayCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveMany(ConwayCreateRequest $request)
    {
        /** @var int|null $generation */
        $generation = $request->generation ?? 1;

        return response()->json(25);
    }
}
