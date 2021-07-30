<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use App\Repositories\StateRepository;
use App\Repositories\UserRepository;
use App\Repositories\CityRepository;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $stateRepository, $userRepository, $cityRepository;

    public function __construct(StateRepository $stateRepository, UserRepository $userRepository, CityRepository $cityRepository)
    {
        $this->stateRepository = $stateRepository;
        $this->userRepository = $userRepository;
        $this->cityRepository = $cityRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->userRepository->list();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "chegou aqui;";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        return $this->userRepository->find($userId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Find total registered users by state
     * Return Total integer 
     * @return Int Total
     */
    public function FindByState($stateId)
    {
        return response()->json(['Total' => $this->stateRepository->findUserByState($stateId)],200);
 
    }

    /**
     * Find total registered users by city
     * Return Total integer 
     * @return Int Total
     */
    public function FindByCity($cityId)
    {
        return response()->json(['Total' => $this->cityRepository->findUserByCity($cityId)],200);
 
    }

   
}
