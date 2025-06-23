<?php

namespace App\Services;

use App\Models\Address;
use App\Models\State;
use App\Models\City;


class AddressService
{
    protected $state;
    protected $city;
    protected $address;

    public function __construct(State $state, City $city, Address $address)
    {
        $this->state = $state;
        $this->city = $city;
        $this->address = $address;
    }
    public function getStates()
    {
        return State::all();
    }

    public function getCities($state_id)
    {
        return City::where('state_id', $state_id)->get();
    }

    public function storeAddress($request)
    {
        $address = new Address();
        $address->user_id = auth('web')->id();
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->email = $request->email;
        $address->state_id = $request->state;
        $address->city_id = $request->city;
        $address->address = $request->address;
        $address->type = $request->type;
        $address->zip_code = $request->zip_code;
        $address->phone = $request->phone;
        $address->save();
        return $address;
    }


    public function updateAddress($request, $id)
    {
        $address = Address::find($id);
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->email = $request->email;
        $address->state_id = $request->state;
        $address->city_id = $request->city;
        $address->address = $request->address;
        $address->type = $request->type;
        $address->zip_code = $request->zip_code;
        $address->phone = $request->phone;
        $address->save();
        return $address;
    }
}
