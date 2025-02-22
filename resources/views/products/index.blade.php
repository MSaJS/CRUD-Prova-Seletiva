@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produtos</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('products.create') }}">
                        Adicionar Produto
                    </a>
                </div><div class="col-sm-6">
                    <div class="form-group col-sm-6">
                        {!! Form::text('search', 'Busca', ['class' => 'form-control', 'maxlength' => 255]) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('products.table')
        </div>
    </div>

@endsection
