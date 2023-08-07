<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorecustomerRequest;
use App\Http\Requests\UpdatecustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = customer::orderBy('idCustomer', 'desc')->paginate();
        return view('admin.customer', $data, [
            "title" => "customer"
        ])->with('data', $data);
    }
    function customer()
    {
        $data = customer::orderBy('idCustomer', 'desc')->paginate();
        return view('admin.customer', $data, [
            "title" => "customer"
        ])->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecustomerRequest $request)
    {
        //
        $request->validate([
            'namaCustomer' => 'required',
            'whatsapp' => 'required',
            'email' => 'required'
        ]);
        $customer = new customer;
        $customer->namaCustomer = $request->namaCustomer;
        $customer->whatsapp = $request->whatsapp;
        $customer->email = $request->email;
        $customer->save();

        return redirect()->to('customer')
            ->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecustomerRequest $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        //
        $customer->delete();
        return redirect()->to('customer')
            ->with('success', 'Data telah berhasil dihapus');
    }
}
