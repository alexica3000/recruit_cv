<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAccountRequest;
use Illuminate\Http\Request;
use App\Account;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::paginate(5);

        return view('accounts.view', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAccountRequest $request)
    {
        Account::create([
            'name' => $request->name,
            'email' => $request->email,
            'manage' => $request->manage_department,
            'password' => $request->password
        ]);

        return redirect()->route('accounts.index')->with('message', 'The account has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->update([
            'name' => $request->name,
            'email' => $request->email,
            'manage' => $request->manage_department,
            'password' =>$request->password
        ]);

        return redirect()->route('accounts.edit', ['id' => $account->id])->with('message', 'The account has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->destroy($account->id);

        return redirect()->route('accounts.index')->with('message', 'The account has been deleted.');
    }
}
