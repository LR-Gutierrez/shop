@extends('layouts.admin')

@section('title')
    {{ $invoice->name ?? 'Facturas' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Invoice</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('invoices.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Purchases Id:</strong>
                            {{ $invoice->purchases_id }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $invoice->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
