<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Please enter title']) !!}
</div>
<div class="form-group">
    {!! Form::label('parent_id', 'Parent category', ['class' => 'form-label']) !!}
    {!! Form::select('parent_id', ['' => 'Select category', ' ' => $listCategories], old('parent_id'), ['class' => 'form-control custom-select']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Please enter description']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}
    {!! Form::select('status', [\App\Enums\CategoryStatus::Unactive => 'Unactive', \App\Enums\CategoryStatus::Active => 'Active'], old('status'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {{-- {!! Form::label('order_by', 'Order by', ['class' => 'form-label']) !!} --}}
    {{-- {!! Form::select('order_by', $list, $selected, ['class' => 'form-control']) !!} --}}
</div>
