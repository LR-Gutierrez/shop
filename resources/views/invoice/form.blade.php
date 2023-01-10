<br>
<section class="container mt-2 container-xxl col-md-12">
    <div class="bd-content">
        <div class="box box-info padding-1">
            <div class="box-body">
                
                <div class="form-group">
                    {{ Form::label('purchases_id') }}
                    {{ Form::text('purchases_id', $invoice->purchases_id, ['class' => 'form-control' . ($errors->has('purchases_id') ? ' is-invalid' : ''), 'placeholder' => 'Purchases Id']) }}
                    {!! $errors->first('purchases_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('status') }}
                    {{ Form::text('status', $invoice->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
                    {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="box-footer mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</section>