<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConwayCreateRequest;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveMany(ConwayCreateRequest $request, CellStateRepository $repository)
    {
        /** @var int|null $generation */
        $generation = $request->generation ?? 1;
        $allData = $request->all();
        $validatedData = $request->validated();

        /** @var array|CellStateDTO[] $dtoArray */
        $dtoArray = [];

//        $id = 1;
//        $state_id = 1;

//        /** @var Manifold|CellDTO $entity */
//        foreach ($request->cell_states as $entity) {
//
//            $dto = new CellStateDTO($id, $entity->id, $state_id, $generation);
//
//            $dtoArray[] = $dto;
//
//            $id = $id + 1;
//        }

        $dtoSet = new CellStateSetDTO($dtoArray);
        $repository->saveEntitySet($dtoSet);

        return response()->json(compact(
            'generation',
            'allData',
            'validatedData',
            'dtoArray',
            'dtoSet',
        ));
    }
}
