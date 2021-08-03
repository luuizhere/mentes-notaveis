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


    public function insert($request)
    {
        if(!$this->state->insert([['name' => $request->name]]))
        {
            return response()->json(['Erro ao inserir o Estado']);
        }
        return response()->json(['Inserido com sucesso'],202);
    }

    public function delete($stateId)
    {
        $state = $this->state->find($stateId);
        if(!$state)
            return response()->json(['Erro, Estado não encontrado'],404);

        if($state->delete())
            return response()->json(['Estado removido com sucesso'],202);   

        return response()->json(['Erro ao remover o estado'],500);
    }
    
    public function update($userId, $request)
    {
        $state = $this->state->find($userId);
        if(!$state)
            return response()->json(['Erro, Estado não encontrado'],404);

        if($state->update($request))
            return response()->json(['Estado alterado com sucesso'],202);   

        return response()->json(['Erro ao remover o Estado'],500);
    }
}