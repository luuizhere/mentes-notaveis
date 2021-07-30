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
		return $this->cities->all()->toJson();
	}   

    public function find(int $cityId)
    {
        if(!$this->cities->find($cityId)){
            return response()->json(['City not found'], 404);
        }
        return $this->cities->find($cityId)->toJson();
    }
}