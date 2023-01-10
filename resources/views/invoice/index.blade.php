@extends('layouts.admin')

@section('title', 'Facturas')

@section('content')
    <section class="container container-xxl col-md-12">
        <div class="bd-content">
            <div class="info content">
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
    
                                <span id="card_title">
                                    {{ __('Facturas') }}
                                </span>
    
                                {{-- <div class="float-right">
                                    <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>ID de compra</th>
                                            <th>Comprador</th>
                                            <th>Monto</th>
                                            <th>Status</th>
                                            <th>Acciones</th>
    
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice)
                                            <tr>                                                
                                                <td>{{ $invoice->purchases_id }}</td>
                                                <td>{{ $invoice->name }}</td>
                                                <td>${{ $invoice->total }}</td>
                                                <td> @if($invoice->status == 1)
                                                    Activa
                                                    @else
                                                        Anulada
                                                    @endif
                                                </td>
    
                                                <td>
                                                    <form action="{{ route('invoices.destroy',$invoice->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " target="_blank" href="{{ route('factura.generateInvoice', ['factura' => $invoice->id] ) }}"><i class="fa fa-fw fa-eye"></i> Generar PDF</a>
                                                        {{-- <a class="btn btn-sm btn-success" href="{{ route('invoices.edit',$invoice->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> --}}
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button> --}}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {!! $invoices->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
