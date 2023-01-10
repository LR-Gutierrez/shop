@extends('layouts.admin')

@section('title', 'Registrar')

@section('content')
    <section class="container container-xxl col-md-12">
        <div class="bd-content">
            <div class="info content">
            </div>
            <div class="row">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Create Invoice</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('invoices.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                @include('invoice.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
