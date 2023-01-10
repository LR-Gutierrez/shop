<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Purchase;

use LaravelDaily\Invoices\Invoice as LaravelDailyInvoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;


/**
 * Class InvoiceController
 * @package App\Http\Controllers
 */
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::select('invoices.id', 'invoices.purchases_id', 'invoices.status', 'users.name', 'purchases.total')
        ->join('purchases', 'purchases.id', 'invoices.purchases_id')
        ->join('users', 'users.id', 'purchases.user_id')
        ->join('products', 'products.id', 'purchases.product_id')
        ->orderBy('invoices.id', 'ASC')
        ->paginate();
        
        return view('invoice.index', compact('invoices'))
            ->with('i', (request()->input('page', 1) - 1) * $invoices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice = new Invoice();
        return view('invoice.create', compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Invoice::$rules);

        $invoice = Invoice::create($request->all());

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);

        return view('invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);

        return view('invoice.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        request()->validate(Invoice::$rules);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id)->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice deleted successfully');
    }
    public function generateInvoice(Request $request, $factura){
        $datos = Purchase::select('purchases.id', 'purchases.user_id as buyer_id', 'buyer.name as buyer_name', 'buyer.email as buyer_email', 'seller.name as seller_name', 'seller.email as seller_email', 'purchases.product_id', 'products.title', 'products.price', 'products.tax', 'purchases.quantity', 'purchases.total', 'purchases.created_at')
        ->join('users as buyer', 'buyer.id', 'purchases.user_id')
        ->join('products', 'products.id', 'product_id')
        ->join('users as seller', 'seller.id', 'products.registered_by')
        ->where('purchases.id', $factura)
        ->orderBy('purchases.id')
        ->get();
        
        $customer = new Buyer([
            'name'          => $datos[0]['buyer_name'], 
            'custom_fields' => [ 
                'email' => $datos[0]['buyer_email'],
            ],
        ]);
        $seller = new Buyer([
            'name'          => $datos[0]['seller_name'], 
            'custom_fields' => [ 
                'email' => $datos[0]['seller_email'],
            ],
        ]);

        $item = (new InvoiceItem())
            ->title($datos[0]['title'])
            ->quantity($datos[0]['quantity'])
            ->pricePerUnit($datos[0]['price']);

        $invoice = LaravelDailyInvoice::make()
            ->sequence($datos[0]['id'])
            ->name('Factura')
            ->buyer($customer)
            ->seller($seller)
            ->taxRate($datos[0]['tax'])
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->date($datos[0]['created_at'])
            ->addItem($item);

        return $invoice->stream();
    }
}
