<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CompanyController extends Controller
{

    public function createCompany() {
        $countries = Country::orderBy('name')->get(['iso_code', 'name']);
        return view('pages.public.company-create', ['countries' => $countries]);
    }

    public function viewJoin() {

    }

    public function registerCompany(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address.country' => 'required|exists:countries,iso_code',
            'address.line' => 'required|string|max:255',
            'address.line2' => 'nullable|string|max:255',
            'address.city' => 'required|string|max:100',
            'address.state' => 'required|string|max:100',
            'address.postcode' => ['required', 'string', 'max:20', 'regex:/^[A-Za-z0-9\s-]*$/']
        ]);

        try {
            DB::transaction(function () use ($data) {
                $company = Company::create([
                    'name' => $data['name'],
                    'phone_number' => $data['phone_number'],
                    'country_id' => Country::isoCode($data['address']['country'])->first()->id,
                    'address' => $data['address']['line'],
                    'address2' => $data['address']['line2'],
                    'city' => $data['address']['city'],
                    'state' => $data['address']['state'],
                    'postal_code' => $data['address']['postcode'],
                ]);

                $user = auth()->user();
                $user->assignRole('company_admin');
                $user->company_id = $company->id;
                $user->save();

                return $company;
            });

            return response()->json([
                "message" => "Success: Company has been created"
            ]);
        } catch (\Throwable $e) {
            Logger($e->getMessage());
            return response('Error: Company registration has failed', 500);
        }
    }
}
