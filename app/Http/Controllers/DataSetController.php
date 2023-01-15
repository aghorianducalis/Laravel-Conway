<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataSetRequest;
use Babylon\Repositories\ConwayDataSetRepository;
use Illuminate\Http\Request;

class DataSetController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDataSetRequest  $request
     * @param ConwayDataSetRepository $repository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataSetRequest $request, ConwayDataSetRepository $repository)
    {
        $validatedInputData = $request->validated();
//        $set = $repository->saveEntity();

        dd(
            'store',
            $validatedInputData,
//            $set,
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param ConwayDataSetRepository $repository
     * @return \Illuminate\Http\Response
     */
    public function show($id) // DataSex $dataSex
    {
        /** @var ConwayDataSetRepository $repository */
        $repository = resolve(ConwayDataSetRepository::class);

        $dto = $repository->getDTO($id);

        return view('conway', compact('dto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // DataSex $dataSex
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
