@extends('layouts.admin')

@section('title', 'Administrar')    

@section('content')    
    <div class="container container-xxl col-md-12">
        <div class="bd-content">
            <div class="info content">
                <h1>Compremos algo Admin!</h1>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        @if (session('purchase'))
                            <p>Deseas ver tu <a href='{{ route('factura.generateInvoice', [ 'factura' => session('purchase') ]) }}' target="_blank">factura</a>?</p>
                        @endif
                    </div>
                @endif
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-4 mt-3">
                        <div class="card" style="width: 18rem;">
                            <img src="../assets/images/items.png" class="card-img-top" alt="Product's image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text" title="Se aplicará un impuesto de {{ $product->tax }}%">Price: ${{ $product->price }}</p>
                                <button href="#" onclick="getid({{ $product->id }})" class="btn btn-success" id="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#buyModal">Comprar ahora <i class="bi bi-cart4"></i></button>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="buyLabel">Alert</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que quiere comprar este producto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <a id="buttonConfirm" href="{{ route('productos.comprar', ["idproducto"=>$product->id]) }}"><button type="button" class="btn btn-success">Confirmar</button></a>
                </div>
                </div>
            </div>
        </div>
        <script>
            function getid (idproducto){
                let url = '{{ route("productos.comprar", ":idproducto") }}';
                url = url.replace(':idproducto', idproducto);
                
                console.log(url);
                $("#buttonConfirm").attr('href', url);
            }
        </script>
@endsection