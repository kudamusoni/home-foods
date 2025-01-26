<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function createCompany() {
        $countries = Country::orderBy('name')->get(['iso_code', 'name']);
        return view('company-create', ['countries' => $countries]);
    }

    public function viewJoin() {

    }

    public function registerCompany(Request $request) {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country' => 'required|exists:countries,iso_code',
            'address' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postcode' => ['required', 'string', 'max:20', 'regex:/^[A-Za-z0-9\s-]*$/']
        ]);

        dd(auth());


        $company = new Company();
        $company->name = $data['name'];
        $company->phone_number = $data['phone_number'];

        $country = Country::isoCode($data['country'])->first();
        $company->country_id = $country->id;

        $company->address = $data['address'];
        $company->address2 = $data['address2'];
        $company->city = $data['city'];
        $company->state = $data['state'];
        $company->postal_code = $data['postcode'];

        $company->save();

        dd(auth()->user);

        return response()->json([
            "message" => "Success: Company has been created"
        ]);
    }
}
