@section('title', 'Kategori')

<x-app-layout>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Categories</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <div class="row text-center text-sm-start">
                    <div class="col-sm-5 col-12 mb-3 mb-md-0">
                        <p class="text-primary m-0 fw-bold mt-2">Categories List</p>
                    </div>
                    <div class="col-sm-7 col-12 mb-2 mb-md-0">
                        <div class="d-sm-flex justify-content-sm-end">
                            <button onclick="addForm('{{ route('category.store') }}')"
                                class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Name</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-category.form />

    @includeIf('components.toast')
    @includeIf('components.modal')

    @push('scripts')
        <script>
            let table;

            $(function() {
                table = $('#dataTable').DataTable({
                    serverSide: true,
                    responsive: true,
                    autoWidth: false,
                    ajax: {
                        url: "{{ route('category.data') }}",
                    },
                    columns: [{
                        data: 'DT_RowIndex',
                        searchable: false
                    }, {
                        data: 'name'
                    }, {
                        data: 'action',
                        orderable: false,
                        searchable: false,
                        sortable: false
                    }]
                });

                $('#categoryModal').on('submit', function(e) {
                    if (!e.preventDefault()) {
                        $.ajax({
                            url: $('#categoryModal form').attr('action'),
                            type: 'post',
                            data: $('#categoryModal form').serialize(),
                            success: function(data) {
                                $('#categoryModal').modal('hide');
                                table.ajax.reload();

                                $('#toast').addClass('text-bg-success')
                                    .removeClass('text-bg-danger');
                                $('#toast').toast('show');
                                $('#toast .toast-body').text('Data berhasil disimpan!');
                            },
                            error: function() {
                                $('#toast').addClass('text-bg-danger')
                                    .removeClass('text-bg-success');
                                $('#toast').toast('show');
                                $('#toast .toast-body').text('Tidak dapat menyimpan data!');
                                return;
                            }
                        });
                    }
                })
            });

            function addForm(url) {
                $('#categoryModal').modal('show');
                $('#categoryModalLabel').text('Add categories');

                $('#categoryModal Form')[0].reset();
                $('#categoryModal Form').attr('action', url);
                $('#categoryModal [name=_method]').val('post');
                $('#categoryModal [name=categoryName]').focus();
            }

            function editForm(url) {
                $('#categoryModal').modal('show');
                $('#categoryModalLabel').text('Update Category');

                $('#categoryModal Form')[0].reset();
                $('#categoryModal Form').attr('action', url);
                $('#categoryModal [name=_method]').val('put');
                $('#categoryModal [name=categoryName]').focus();

                $.get(url)
                    .done((response) => {
                        $('#categoryModal [name=categoryName]').val(response.name);
                    })
                    .fail((error) => {
                        $('#toast').addClass('text-bg-danger')
                            .removeClass('text-bg-success');
                        $('#toast').toast('show');
                        $('#toast .toast-body').text('Tidak dapat menampilkan data!');
                        return;
                    });
            }

            function deleteData(url) {
                $('#confirmModal').modal('show');
                $('#confirmModal .modal-body').text('Apakah Anda yakin ingin menghapus data ini?');

                $('#confirmDelete').click(function() {
                    $.post(url, {
                            '_method': 'delete',
                            '_token': '{{ csrf_token() }}'
                        })
                        .done((response) => {
                            $('#confirmModal').modal('hide');
                            table.ajax.reload();

                            $('#toast').addClass('text-bg-success')
                                .removeClass('text-bg-danger');
                            $('#toast').toast('show');
                            $('#toast .toast-body').text('Data berhasil dihapus!');
                        })
                        .fail((error) => {
                            $('#toast').addClass('text-bg-danger')
                                .removeClass('text-bg-success');
                            $('#toast').toast('show');
                            $('#toast .toast-body').text('Tidak dapat menghapus data!');
                            return;
                        })
                })
            }
        </script>
    @endpush
</x-app-layout>
