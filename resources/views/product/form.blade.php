<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $product->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tax') }}
            {{ Form::text('tax', $product->tax, ['class' => 'form-control' . ($errors->has('tax') ? ' is-invalid' : ''), 'placeholder' => 'Tax']) }}
            {!! $errors->first('tax', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('registered_by', auth()->id(), ['class' => 'form-control' . ($errors->has('registered_by') ? ' is-invalid' : ''), 'placeholder' => 'Registered By']) }}
            {!! $errors->first('registered_by', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>