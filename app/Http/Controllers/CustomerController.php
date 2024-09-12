<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Filters\CustomerFilter;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

final class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): CustomerCollection
    {
        $filter = new CustomerFilter;
        $queryItems = $filter->transform($request);
        $include_invoices = $request->query('includeInvoices');
        $customers = Customer::where($queryItems);
        if ($include_invoices) {
            $customers = $customers->witth('Invoices');
        }

        // dd($request->query());
        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request): CustomerResource
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): CustomerResource
    {
        //
        $include_invoices = request()->query('includeInvoices');
        if ($include_invoices) {
            return new CustomerResource($customer->loadMissing('invoices'));
        }

        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): void
    {
        //
    }
}
