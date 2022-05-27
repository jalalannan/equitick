<?php

namespace App\Http\Controllers;
use App\Models\Deal as DealFilter;
use App\Services\Deals\DealService;
use App\Filters\DealFilter\Deal;
use App\Http\Requests\Deal\GetDealRequest;
use App\Http\Requests\Deal\DealRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
class DealController extends Controller
{

    public function __construct(DealService $service)
    {
        $this->service = $service;
    }

    public function getDeals(GetDealRequest $request, Builder $builder)
    {
        $deals = $this->service->FilterBy(request()->all());

        return return_responses('deals', ['status' => 200, 'data' => $deals->get()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DealRequest $request)
    {
        $status = $this->service
            ->setAttrs($request->only('Deal', 'Login', 'Action', 'Entry', 'Time', 'Symbol', 'Price', 'Profit', 'Volume'))
            ->save();
        return created_responses('deals', ['deal' => $status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
