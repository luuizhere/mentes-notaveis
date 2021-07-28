<?php

namespace App\Repositories;

use App\Models\State;

class StateRepository 
{
	private $state;

	public function __construct(State $state)
	{
		$this->state = $state;
	}

    /**
     * List all States not deleted
     */
	public function list()
	{
		return $this->state->all()->toJson();
	}    

    /**
     * Find State with ID
     *  @param  \App\Models\State  ID
     *  @return \Illuminate\Http\Json
     */
    public function findState(int $stateId)
    {
        if(!$this->state->find($stateId)){
            return response()->json(['State not found'], 404);
        }
        return $this->state->find($stateId)->toJson();
    }
}