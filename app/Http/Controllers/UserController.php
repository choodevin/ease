<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactDetails;
use App\Models\PresetKeywords;
use App\Models\VendorDetails;
use App\Rules\ContactNumber;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const USER_TYPE_MEMBER = 'member';
    const USER_TYPE_VENDOR = 'vendor';

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'id' => 'required',
                'password' => 'required'
            ],
            [
                'id.required' => 'Phone number/Email is empty',
                'password.required' => 'Password is empty'
            ]
        );

        $id = $request->input('id');
        $password = $request->input('password');

        $validateUser = $this->validateLogin($id, $password);

        if ($validateUser != null) {
            session(['current_user' =>  $validateUser]);
            return view('home');
        } else {
            return back()->withErrors('Failed to login');
        }
    }


    public function register(Request $request)
    {
        $name = null;
        $email = null;
        $tel = null;
        $password = null;
        $referralCode = null;
        $type = null;
        $id = null;
        $contactDetId = null;
        $vendorDetId = null;
        $category = null;
        $address = null;

        if ($request->has(UserController::USER_TYPE_MEMBER)) {
            $this->validate(
                $request,
                [
                    'name' => ['required', 'max:255'],
                    'email' => ['required', 'unique:user'],
                    'tel' => ['required', new ContactNumber],
                    'password' => 'required',
                ],
                [
                    'name.required' => 'Name is empty',
                    'email.required' => 'Email is empty',
                    'tel.required' => 'Phone number is empty',
                    'password.required' => 'Password is empty',
                    'name.max' => 'Name has exceeded the limit (max 255)',
                    'email.unique' => 'Email entered is an existing user',
                ]
            );

            $name = trim($request->input('name'));
            $email =  $request->input('email');
            $tel = $request->input('tel');
            $password = Hash::make($request->input('password'));
            $referralCode = $request->input('referralCode');
            $type = UserController::USER_TYPE_MEMBER;
            $id = User::max('seqid') + 1;
            $contactDetId = ContactDetails::max('seqid') + 1;
        } else if ($request->has(UserController::USER_TYPE_VENDOR)) {
            $this->validate(
                $request,
                [
                    'name' => ['required', 'max:255'],
                    'email' => ['required', 'unique:user'],
                    'tel' => ['required', new ContactNumber],
                    'password' => 'required',
                    'address' => ['required', 'max:16777215'],
                    'category' => ['required', 'max:100'],
                ],
                [
                    'name.required' => 'Name is empty',
                    'email.required' => 'Email is empty',
                    'tel.required' => 'Phone number is empty',
                    'password.required' => 'Password is empty',
                    'name.max' => 'Name has exceeded the limit (max 255)',
                    'email.unique' => 'Email entered is an existing user',
                    'address.required' => 'Address is empty',
                    'category.required' => 'Category is empty',
                ]
            ); 
            $name = trim($request->input('name'));
            $email =  $request->input('email');
            $tel = $request->input('tel');
            $password = Hash::make($request->input('password'));
            $referralCode = $request->input('referralCode');
            $address = $request->input('address');
            $category = $request->input('category');
            $type = UserController::USER_TYPE_VENDOR;
            $id = User::max('seqid') + 1;
            $contactDetId = ContactDetails::max('seqid') + 1;
            $vendorDetId = VendorDetails::max('seqid') + 1;
        } else {
            return view('register', ['error' => 'An error has occured']);
        }

        $createUser = User::create(
            [
                'seqid' => $id,
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'referral_code' => $referralCode,
                'type' => $type,
                'address' => $address,
            ]
        );

        $createContactDetails = ContactDetails::create(
            [
                'seqid' => $contactDetId,
                'tel' => $tel,
                'reference_user' => $id
            ]
        );

        if($request->has(UserController::USER_TYPE_VENDOR)) {
            $createVendorDetails = VendorDetails::create([
                'seqid' => $vendorDetId,
                'reference_user' => $id,
                'category' => $category
           ]);
        }

        if ($createUser && $createContactDetails) {
            return view('home');
        } else {
            User::find($id)->delete();
            ContactDetails::find($contactDetId)->delete();
            return back()->withErrors('There was an error registering your account, please try again.');
        }
    }

    public function getPresetKeywords()
    {
        $keyword = PresetKeywords::all('keyword');
        $keywordList = [];
        foreach ($keyword as $k) {
            $keywordList[] = $k['keyword'];
        }
        return view('register')->with('keywordList', $keywordList);
    }

    protected function validateLogin($id, $password)
    {
        $userValidate = null;

        if (filter_var($id, FILTER_VALIDATE_EMAIL)) {
            //Email login
            $userValidate = User::where([
                ['email', $id]
            ])->get()->first();
        } else {
            //Phone number login
            $userValidate = ContactDetails::where([
                ['tel', $id]
            ])->get()->first();

            $userValidate = User::find($userValidate->reference_user);
        }

        if ($userValidate != null) {
            if (Hash::check($password, $userValidate->password)) {
                return $userValidate->seqid;
            }
        }

        return null;
    }

    public static function checkLoggedIn() {
        $user = session('current_user');

        if(!empty($user)) {
            return true;
        }
        return false;
    }
}
