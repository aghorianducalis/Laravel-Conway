<?php

namespace App\Http\Controllers;

use Babylon\Repositories\CellContactRepository;
use Illuminate\Http\Request;

class CellContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Babylon\Repositories\CellContactRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, CellContactRepository $repository)
    {
        // todo get from request
        $ids = \App\Models\CellContact::query()->select(['id'])->get()->pluck(['id'])->toArray();
        $dtoSet = $repository->getEntityDTOSet($ids);

        return response()->json($dtoSet->dtoSet);
    }
}
