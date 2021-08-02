<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository 
{
    private $users;

	public function __construct(User $user)
	{
		$this->users = $user;
	}

    /**
     * List all States not deleted
     */
	public function list()
	{
        $users = [] ;

        foreach($this->users->orderBy('name')->get() as $user)
        {
           array_push($users,[
                                'Id' => $user->id,
                                'Nome' => $user->name,
                                'Endereço' => $user->address->name,
                                'Cidade ' => $user->address->city->name,
                                'Estado' => $user->address->city->state->name,
                            ]);
        }
		return $users;
	}   

    public function find(int $userId)
    {
        if(!$this->users->find($userId)){
            return response()->json(['User not found'], 404);
        }
        return $this->users->find($userId)->toJson();
    }

    public function insert($request)
    {
        if(!$this->users->insert([['name' => $request->name,
                                   'address_id' => $request->address_id
                                 ]]))
        {
            return response()->json(['Erro ao inserir o Usuario']);
        }
        return response()->json(['Inserido com sucesso'],202);
    }

    public function delete($userId)
    {
        $user = $this->users->find($userId);
        if(!$user)
            return response()->json(['Erro, Usuario não encontrado'],404);

        if($user->delete())
            return response()->json(['Usuario removido com sucesso'],202);   

        return response()->json(['Erro ao remover o Usuario'],500);
    }
}