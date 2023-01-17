<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConwayCreateRequest;
use App\Models\CellState;
use Babylon\DTO\CellStateDTO;
use Babylon\DTO\CellStateSetDTO;
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
     * @param \Babylon\Repositories\CellStateRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveMany(ConwayCreateRequest $request, CellStateRepository $repository)
    {
        /** @var int|null $generation */
        $generation = $request->generation;

        /** @var array|CellStateDTO[] $dtoArray */
        $dtoArray = [];

        foreach ($request->cell_states as $entity) {

            /** @var CellState $cellState */
            $cellState = CellState::query()->create($entity); // todo create record using repository
            $dto = $repository->getEntityDTO($cellState->id);

            $dtoArray[] = $dto;
        }

        $dtoSet = new CellStateSetDTO($dtoArray);

        return response()->json($dtoSet->dtoSet);
    }
}
