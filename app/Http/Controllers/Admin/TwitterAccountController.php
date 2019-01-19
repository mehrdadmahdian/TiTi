<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TwitterAccount\StoreTwitterAccount;
use App\Http\Requests\TwitterAccount\UpdateTwitterAccount;
use App\Models\TwitterAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TwitterAccountController extends BaseAdminController
{
    public function index(Request $request)
    {
        $twitterAccounts = Auth::user()->twitterAccounts;
        return view('admin.twitter-accounts.index', compact('twitterAccounts'));
    }

    public function store(StoreTwitterAccount $request)
    {
        //todo: complete form requests

        DB::beginTransaction();
        try {
            $twitterAccount = TwitterAccount::create([
                'name'               => $request->name,
                'description'        => $request->description,
                'username'           => $request->username,
//                'password'           => $request->description,
//                'application_oauth_access_token'        => $request->oauth_access_token,
//                'application_oauth_access_token_secret' => $request->oauth_access_token_secret,
//                'application_consumer_key'              => $request->consumer_key,
//                'application_consumer_secret'           => $request->consumer_secret,
            ]);

            Auth::user()->twitterAccounts()->attach($twitterAccount->id);

            DB::commit();
            return redirect()->back()->with(['message' => trans('message.store.successful')]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function update(UpdateTwitterAccount $request)
    {

    }
}
