$(document).ready( function () {
    fetchCategory();

    function fetchCategory(page, keyword = null) {
        if (!page) {
            page = 1;
        }

        $.ajax({
            url: 'categories/fetch-category?page=' + page,
            type: 'GET',
            dataType: 'json',
            data: {
                keyword:keyword
            },
            success: function (response) {
                $('#list-category').html(
                    `<div class="card shadow-none border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="categories-datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Parent category</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-category-content">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end category-pagination">
                        <div class="btn-group">
                            <a class="btn btn-secondary btn-sm ${response.meta.current_page == 1 ? 'disabled' : ''}" href="categories?page=1"> &laquo; </a>
                            <a class="btn btn-secondary btn-sm ${response.meta.current_page == 1 ? 'disabled' : ''}" href="categories?page=${response.meta.current_page - 1}"> &#8249; </a>
                            <a class="btn btn-secondary btn-sm">${response.meta.current_page}</a>
                            <a class="btn btn-secondary btn-sm ${response.meta.current_page == response.meta.last_page ? 'disabled' : ''}" href="categories?page=${response.meta.current_page + 1}"> &#8250; </a>
                            <a class="btn btn-secondary btn-sm ${response.meta.current_page == response.meta.last_page ? 'disabled' : ''}" href="categories?page=${response.meta.last_page}"> &raquo; </a>
                        </div>
                    </div>`
                );

                // Detail list category
                var countCategories = response.data.length;
                $.each(response.data, function(key, category) {
                    $('#list-category-content').append(
                        (countCategories > 0 ?
                            `<tr>
                                <td>${category.id}</td>
                                <td>${category.title}</td>
                                <td>` +
                                    (category.parent_id ?
                                        `<span>${category.parent_id}</span>`
                                    :
                                        `<b>No parent category</b>`
                                    ) +
                                `</td>
                                <td>` +
                                    (category.status == 2 ?
                                        `<button class="badge badge-light-success border-0">Active</button>`
                                    :
                                        `<button class="badge badge-light-danger border-0">Unactive</button>`
                                    ) +
                                `</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>`
                        :
                            `<tr>
                                <td colspan="4">No category</td>
                            </tr>`
                        )
                    );
                });
            }
        });
    }

    // Pagination
    $(document).on('click', '.category-pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchCategory(page);
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Search category
    $(document).on('click', '.btn-category-search', function (e) {
        e.preventDefault();
        var keyword = $('.search-category-form select[name = "keyword"]').val();
        fetchCategory(null, keyword);
    });
});
