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

	public function list()
	{
		return $this->state->all()->toJson();
	}    

    public function findState($stateId)
    {
        if(!$this->state->find($stateId)){
            return ['Not Found State'];
        }
        return $this->state->find($stateId)->toJson();
    }
}