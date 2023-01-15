<?php

namespace App\Http\Controllers;

use Babylon\Repositories\CellRepository;
use Illuminate\Http\Request;

class CellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Babylon\Repositories\CellRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, CellRepository $repository)
    {
        // todo get from request
        $ids = \App\Models\Cell::query()->select(['id'])->get()->pluck(['id'])->toArray();
        $dtoSet = $repository->getEntityDTOSet($ids);

        return response()->json($dtoSet->dtoSet);
    }
}
