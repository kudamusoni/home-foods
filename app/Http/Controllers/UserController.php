<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()  {
        $user = auth()->user();
        return view('pages.admin.users', [
            'users' => $user->company->users
        ]);
    }

    public function viewEdit(User $user)  {
        $countries = Country::orderBy('name')->get(['iso_code', 'name']);

        return view('pages.admin.user-edit', [
            'user' => (new UserResource($user->load('country')))->resolve(),
            'countries' => $countries
        ]);
    }

    public  static function edit(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user)],
            'country' => ['required', Rule::exists('countries', column: 'iso_code')],
        ]);

        try {
            DB::transaction(function () use ($user, $data) {
                $country = Country::isoCode($data['country'])->first();
                $user->country_id = $country->id;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->save();

                return $user;
            });
        } catch (\Throwable $e) {
            Logger($e->getMessage());
            return response('Error: User update failed', 500);
        }
    }

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

    public function viewInvite()
    {
        $company = auth()->user()->company;

        $response = $inviteCodeService->generateForUser($user);
        $code = $response->code;
    }
}
