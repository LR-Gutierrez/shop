@extends('layouts.admin')

@section('title', 'Editar producto')

@section('content')
<br>
    <div class="mt-5 container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Product</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('product.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
