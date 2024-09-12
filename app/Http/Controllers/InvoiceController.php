<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Filters\InvoiceFilter;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceCollection;
use App\Models\Invoice;
use Illuminate\Http\Request;

final class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): InvoiceCollection
    {
        //
        $filter = new InvoiceFilter;
        $query_items = $filter->transform($request);
        if ($query_items !== []) {

            return new InvoiceCollection(Invoice::paginate());
        }
        $invoices = Invoice::where($query_items)->paginate();

        return new InvoiceCollection($invoices->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice): void
    {
        //
    }
}
