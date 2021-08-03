<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository 
{
    private $address;

	public function __construct(Address $address)
	{
		$this->address = $address;
	}

    /**
     * List all States not deleted
     */
	public function list()
	{
		$addresses = [] ;

        foreach($this->address->orderBy('name')->get() as $address)
        {
           array_push($addresses,[
                                  'Id' => $address->id,
                                  'Endereço ' => $address->name,
                                  'Cidade' => $address->city->name,
                                  'Estado' => $address->city->state->name,

                                 ]);
        }

        return $addresses;
	}   

    public function find(int $addressId)
    {
        if(!$this->address->find($addressId)){
            return response()->json(['Endereço não encontrado'], 404);
        }
        return $this->address->find($addressId)->toJson();
    }

    public function insert($request)
    {
        if(!$this->address->insert([
                                    ['name' => $request->name,'city_id' => $request->city_id]
                                   ])
          )
        {
            return response()->json(['Erro ao inserir o Endereço']);
        }
        return response()->json(['Inserido com sucesso'],202);
    }

    public function delete($addressId)
    {
        $address = $this->address->find($addressId);
        if(!$address)
            return response()->json(['Erro, Endereço não encontrado'],404);

        if($address->delete())
            return response()->json(['Endereço removido com sucesso'],202);   

        return response()->json(['Erro ao remover o Endereço'],500);
    }
    
    public function update($addressId, $request)
    {
        $address = $this->address->find($addressId);
        if(!$address)
            return response()->json(['Erro, Endereço não encontrada'],404);

        if($address->update($request))
            return response()->json(['Endereço alterada com sucesso'],202);   

        return response()->json(['Erro ao remover a Endereço'],500);
    }
}