<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function chooseUser() {
        $user = auth()->user();

        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];

        $countries = Country::orderBy('name')->get(['iso_code', 'name']);

        return view('pages.public.user-register', [
            'user' => $userData,
            'countries' => $countries
        ]);
    }

    public function completeRegistration(Request $request)
    {
        $data = $request->validate([
            'address.country' => ['required', Rule::exists('countries', column: 'iso_code')],
            'address.line1' => 'required|max:255',
            'address.line2' => 'max:255',
            'address.city' => 'required',
            'address.state' => 'required',
            'address.postcode' => 'required',
            'phone_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        try {

            DB::transaction(function () use ($data) {
                $user = auth()->user();

                $country = Country::isoCode($data['address']['country'])->first();
                $user->country_id = $country->id;

                $user->phone_number = $data['phone_number'];
                $user->address = $data['address']['line1'];
                $user->address2 = $data['address']['line2'];
                $user->city = $data['address']['city'];
                $user->state = $data['address']['state'];
                $user->postal_code = $data['address']['postcode'];

                $role = Role::where('name', 'customer')->first();
                $user->assignRole($role);

                $user->save();
            });

            return response()->json([
                "message" => "Success: User Registration has been completed"
            ]);
        } catch (\Throwable $e) {
            Logger($e->getMessage());
            return response('Error: User registration failed', 500);
        }
    }
}
