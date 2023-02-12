<div class="col-xl-8 col-md-8">
    <div class="card shadow-none border">
        <div class="card-body">
            <div class="table-responsive">
                <table id="users-list-datatable" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Parent category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key => $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    @if ($category->parent_id)
                                        <span>{{ $category->parent_id }}</span>
                                    @else
                                        <b>No parent category</b>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->status == \App\Enums\CategoryStatus::Active)
                                        <button class="badge badge-light-success border-0">Active</button>
                                    @else
                                        <button class="badge badge-light-danger border-0">Unactive</button>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-primary btn-sm rounded-0">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm rounded-0">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No category</td>
                            </tr>
                        @endforelse ()
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $categories->appends(request()->all())->links() }}
        </div>
    </div>
</div>
