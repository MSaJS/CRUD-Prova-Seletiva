<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{{ $product->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', 'Descrição:') !!}
    <p>{{ $product->descricao }}</p>
</div>

<!-- Preco Field -->
<div class="col-sm-12">
    {!! Form::label('preco', 'Preço:') !!}
    <p>{{ $product->preco }}</p>
</div>

<!-- Quantidade Field -->
<div class="col-sm-12">
    {!! Form::label('quantidade', 'Quantidade:') !!}
    <p>{{ $product->quantidade }}</p>
</div>

<!-- Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('category_id', 'Categoria:') !!}
    <p>{{ $product->category->nome }}</p>
</div>

