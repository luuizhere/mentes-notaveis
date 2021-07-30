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
    public function find(int $stateId)
    {
        if(!$this->state->find($stateId)){
            return response()->json(['State not found'], 404);
        }
        return $this->state->find($stateId)->toJson();
    }

    public function findUserByState(int $stateId){
        return $this->state->Join('cities','cities.state_id','=','states.id')
                           ->Join('addresses','addresses.city_id','=','cities.id')
                           ->Join('users','users.address_id','=','addresses.id')
                           ->where('states.id',$stateId)
                           ->count();
    }
}