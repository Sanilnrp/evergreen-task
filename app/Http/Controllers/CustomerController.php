<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::whereBelongsTo(Auth::user())->get();
        return view('customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            Customer::create($data);
            DB::commit();
            return redirect('customer')->with('success', 'Customer created successfully');
        } catch (\Exception $exception) {
            Log::info($exception);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong please try again!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        if ($customer->user_id == Auth::id()) {
            return view('customer.view', compact('customer'));
        } else {
            return redirect('customer')->with('error', 'Customer not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        if ($customer->user_id == Auth::id()) {
            return view('customer.edit', compact('customer'));
        } else {
            return redirect('customer')->with('error', 'Customer not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        if ($customer->user_id == Auth::id()) {
            DB::beginTransaction();
            try {
                $data = $request->all();
                $customer->fill($data)->save();
                DB::commit();
                return redirect('customer')->with('success', 'Customer updated successfully');
            } catch (\Exception $exception) {
                Log::info($exception);
                DB::rollBack();
                return redirect()->back()->with('error', 'Something went wrong please try again!');
            }
        } else {
            return redirect('customer')->with('error', 'Customer not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if ($customer->user_id == Auth::id()) {
            DB::beginTransaction();
            try {
                $customer->delete();
                DB::commit();
                return redirect('customer')->with('success', 'Customer deleted successfully');
            } catch (\Exception $exception) {
                Log::info($exception);
                DB::rollBack();
                return redirect()->back()->with('error', 'Something went wrong please try again!');
            }
        } else {
            return redirect('customer')->with('error', 'Customer not found');
        }
    }
}
