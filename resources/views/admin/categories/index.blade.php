@extends('layouts.admin.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/admin_management/categories/css/app.css') }}">
@endpush
@section('content')
<section class="category-management">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-12">
            <div class="row align-items-center mb-1">
                <div class="col-xl-4 col-md-4">
                    <h3 class="mb-0">Category management</h3>
                </div>
                <div class="col-md-8 mb-1">
                    {{ Form::open(['class' => 'd-flex search-category-form']) }}
                        {!! Form::select('keyword',
                            ['' => '--- Select category ---', ' ' => $listCategories],
                            request()->keyword,
                            ['class' => 'select-category custom-select custom-select-lg'])
                        !!}
                        {!! Form::button('Search', ['class' => 'btn btn-primary glow px-2 ml-1 btn-category-search']) !!}
                    {{ Form::close() }}
                </div>
            </div>
            <div class="row">
                @include('admin.categories.form.create')
                <div class="col-xl-8 col-md-8">
                    <div id="list-category"></div>
                </div>                
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
