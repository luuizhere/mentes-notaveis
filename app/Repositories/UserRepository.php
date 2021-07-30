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
		return $this->users->all()->toJson();
	}   

    public function find(int $userId)
    {
        if(!$this->users->find($userId)){
            return response()->json(['User not found'], 404);
        }
        return $this->users->find($userId)->toJson();
    }
}