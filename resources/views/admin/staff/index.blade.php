@extends('layouts.main')

@section('title', 'Staff')

@section('buttonallFunction')
        <a href="{{ route('staff.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Create</a>
@endsection

@section('content')
    @section('pageTitle', 'Staff')

    <div class="delete-response">

    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableStaff">
                            <thead>
                                <tr>
                                    <th width="70px">No</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Position</th>
                                    <th>Is Active</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger delete-staff" value="">
                        <strong>
                            Hapus
                        </strong>
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addonJs')
    <script>
        var datatable = $('#tableStaff').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: '{!! url()->current() !!}',
            order: [
                [1, 'asc']
            ],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    width: '1%',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone_number',
                    name: 'phone_number',
                },
                {
                    data: 'position',
                    name: 'position',
                },
                {
                    data: 'is_active',
                    name: 'is_active',                    
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '1%'
                }
            ],
            sDom: '<"secondBar d-flex flex-wrap justify-content-between mb-2"lf>rt<"bottom"p>',
            "fnCreatedRow": function(nRow, data) {
                $(nRow).attr('id', 'staff' + data.id);
            },
        });

        $(document).on("click", ".delete_modal", function() {
            var id = $(this).data('id');
            $(".modal-footer .delete-staff").val(id);
        });

        jQuery(document).ready(function($) {
            ////----- DELETE a link and remove from the page -----////
            jQuery('.delete-staff').click(function() {
                var staff_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: 'staff/' + staff_id,
                    success: function(data) {
                        $('#exampleModal').modal('hide');
                        $("#staff" + staff_id).remove();
                        $('#tableStaff').DataTable().ajax.reload();
                        $('#tableStaff').DataTable().draw();
                        $(".delete-response").append(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"> &times; </span></button></div>'
                        )
                    }
                });
            });
        });
    </script>
@endpush