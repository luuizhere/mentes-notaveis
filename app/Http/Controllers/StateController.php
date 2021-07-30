<?php

namespace App\Http\Controllers;

use App\Repositories\StateRepository;

use Illuminate\Http\Request;

class StateController extends Controller
{
    private $stateRepository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    /**
     * Return  listing All States.
     *
     * @return \Illuminate\Http\Json
     */
    public function index()
    {
        return $this->stateRepository->list();
    }

    /**
     * Receive Request for creating a new State.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->stateRepository->insert($request);
    }

    /**
     * Show the specified State.
     *
     * @param  \App\Models\State  $state  
     * @return \Illuminate\Http\Response
     */
    public function show($state)
    {
        return $this->stateRepository->find($state);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $stateId)
    {
        return $this->stateRepository->delete($stateId);
    }
}
