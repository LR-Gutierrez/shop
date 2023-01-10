@extends('layouts.admin')

@section('title')
    {{ $product->name ?? 'Lista de Productos' }}
@endsection

@section('content')
<br>
    <div class="mt-5 container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $product->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $product->price }}
                        </div>
                        <div class="form-group">
                            <strong>Tax:</strong>
                            {{ $product->tax }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $product->status }}
                        </div>
                        <div class="form-group">
                            <strong>Registered By:</strong>
                            {{ $product->registered_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
