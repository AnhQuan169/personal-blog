<div class="col-xl-4 col-md-4">
    <div class="col-md-12 px-0">
        <div class="card shadow-none border">
            <div class="card-body">
                {{-- Update category --}}
                {!! Form::open(['method' => 'POST', 'class' => 'jquery-val-form']) !!}
                    @include('admin.categories.form.form')
                    <div class="form-group d-flex justify-content-lg-between">
                        {!! Form::button('Back', ['class' => 'btn btn-secondary']) !!}
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
