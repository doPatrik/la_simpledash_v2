<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetAddressController extends Controller
{
    public function create()
    {
        return view('Setting.address_setting_redirect');
    }

    public function store(AddressRequest $request)
    {
        /**
         * @var User $user
         */
        $user = Auth::user();
        $user->addresses()->create($request->validated());

        return redirect()->route('dashboard');
    }
}
