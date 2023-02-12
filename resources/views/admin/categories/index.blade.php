@extends('layouts.admin.app')
@section('content')
<section class="category-management">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-12">
            <div class="row align-items-center mb-1">
                <div class="col-xl-4 col-md-4">
                    <h3 class="mb-0">Category management</h3>
                </div>
                <div class="col-xl-8 col-md-8">
                    {!! Form::open(['method' => 'GET', 'route' => ['admin.categories.index', $categories], 'class' => 'd-flex']) !!}
                        {!! Form::select('keyword', ['' => '--- Select category ---', ' ' => $listCategories], request()->keyword, ['class' => 'select-category custom-select custom-select-lg border-none']) !!}
                        {!! Form::submit('Search', ['class' => 'btn btn-primary ml-1']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                @include('admin.categories.form.create')
                @include('admin.categories.list')
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $('.select-category').select2();
</script>
@endpush
