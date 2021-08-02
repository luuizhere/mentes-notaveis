<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository 
{
    private $cities;

	public function __construct(City $cities)
	{
		$this->cities = $cities;
	}

    /**
     * List all States not deleted
     */
	public function list()
	{
        $cities = [] ;

        foreach($this->cities->orderBy('name')->get() as $city)
        {
           array_push($cities,[
                                  'Id' => $city->id,
                                  'Cidade ' => $city->name,
                                  'Estado' => $city->state->name,
                                 ]);
        }
		return $cities;
	}   

    public function find(int $cityId)
    {
        if(!$this->cities->find($cityId)){
            return response()->json(['City not found'], 404);
        }
        return $this->cities->find($cityId)->toJson();
    }

    public function findUserByCity(int $cityId){
        return $this->cities->Join('addresses','addresses.city_id','=','cities.id')
                           ->Join('users','users.address_id','=','addresses.id')
                           ->where('cities.id',$cityId)
                           ->count();
    }

    public function insert($request)
    {
        if(!$this->cities->insert([['name' => $request->name,
                                    'state_id' => $request->state_id
                                 ]]))
        {
            return response()->json(['Erro ao inserir o Estado']);
        }
        return response()->json(['Inserido com sucesso'],202);
    }

    public function delete($stateId)
    {
        $city = $this->cities->find($stateId);
        if(!$city)
            return response()->json(['Erro, Cidade não encontrada'],404);

        if($city->delete())
            return response()->json(['Cidade removida com sucesso'],202);   

        return response()->json(['Erro ao remover a cidade'],500);
    }
}