<div class="col-xl-4 col-md-4">
    <div class="col-md-12 px-0">
        <div class="card shadow-none border">
            <div class="card-body">
                {{-- Add category --}}
                {!! Form::open(['method' => 'POST', 'route' => 'admin.categories.store', 'class' => 'jquery-val-form']) !!}
                    @include('admin.categories.form.form')
                    <div class="form-group d-flex justify-content-center">
                        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
