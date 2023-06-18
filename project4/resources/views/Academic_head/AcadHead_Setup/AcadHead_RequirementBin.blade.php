@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">


        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row-col-sm-6 mb-2">
                        <div class="col-md-3 ml-4">
                            <h1 class="m-0">Requirement Bin</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="container">
                <div class="mr-5 ml-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">List of Document Bin</h3>
                            <div class="text-right">
                                <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                                    class="px-4 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Create
                                    Requirement Bin</button>
                            </div>
                        </div>

                        <div class="card-header">
                            <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                            <select name="dataTable_length" aria-controls="dataTable"
                                class="ml-5 col-1 custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">
                                    10
                                </option>
                                <option value="25">
                                    25
                                </option>
                                <option value="50">
                                    50
                                </option>
                                <option value="100">
                                    100
                                </option>
                            </select>
                        </div>

                        <!-- Tables of roles -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead class="pal-1 text-col-2">
                                    <tr>
                                        <th>Title</th>
                                        <th>Requirements</th>
                                        <th>Deadline</th>
                                        <th style="">Status</th>
                                        <th class="text-center" style="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requirementbins as $requirementbin)
                                        <tr>
                                            <td>{{ $requirementbin->title }}</td>
                                            <td>{{ $requirementbin->description }}</td>
                                            <td>{{ $requirementbin->deadline }}</td>
                                            <td><button type="button"
                                                    class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300
                                                    font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">{{ $requirementbin->status }}</button>
                                            </td>
                                            <td class="text-center">
                                                <form method="POST"
                                                    action="{{ route('delete_requirementbins', $requirementbin->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button data-toggle="modal"
                                                        onclick="openViewModal('{{ $requirementbin->title }}', '{{ $requirementbin->description }}', '{{ $requirementbin->deadline }}', '{{ $requirementbin->status }}') "
                                                        type="button"
                                                        class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View</button>
                                                    <button type="button"
                                                        onclick="openEditModal('{{ $requirementbin->title }}', '{{ $requirementbin->description }}',  '{{ $requirementbin->id }}', '{{ $requirementbin->deadline }}', '{{ $requirementbin->status }}') "
                                                        class="px-3 py-2 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300">Edit</button>
                                                    <button type="button"
                                                        class="px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 delete-button"
                                                        title="Delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="text-col-1" style="font-size: .9rem;">
                                    <tr>
                                        <td>
                                            <div class="col-sm-12">
                                                <div class="dataTables_info" id="dataTable_info" role="status"
                                                    aria-live="polite">
                                                    Showing 1 to 4 of 4 entries
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!--View Modal-->
            <section class="content">
                <form id="viewForm" action="" method="">
                    <div class="modal fade" id="modal-xl-view">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">View Requirement Bin</h4>
                                    <button type="button" class="close" data-dismiss="modal" id="View_cancelButton"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="height: 500px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    tabindex="1" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Description</label>
                                                <textarea type="text" class="form-control" id="description" name="description" tabindex="1" style="height: 100px;"
                                                    readonly></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Deadline</label>
                                                <input type="text" class="form-control" id="deadline" name="deadline"
                                                    placeholder="Title" tabindex="1" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Status</label>
                                                <input type="text" class="form-control" id="status" name="status"
                                                    tabindex="1" readonly>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger" id="View_closeModalButton"
                                        data-dismiss="modal">Close</button>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                </form>
            </section>

            <!--Edit Modal-->
            <section class="content">
                <form id="editForm" action="" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal fade" id="modal-xl-edit">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Requirement Bin</h4>
                                    <button type="button" class="close" data-dismiss="modal" id="cancelButton"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="height: 500px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Title" tabindex="1" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Description</label>
                                                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description"
                                                    tabindex="1" style="height: 100px;"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Deadline</label>
                                                <input type="datetime-local" class="form-control" id="deadline"
                                                    name="deadline" tabindex="1" value="{{ date('Y-m-d 00:00:00') }}"
                                                    min="{{ date('Y-m-d 00:01:00') }}" data-parsley-excluded="true">

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Status</label>
                                                <select id="status" name="status" class="form-control select2">
                                                    <option disabled selected>List of status</option>
                                                    <option value="ONGOING">ONGOING</option>
                                                    <option value="PENDING">PENDING</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger" id="closeModalButton"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save
                                        changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </form>
            </section>

            <!--Create Modal-->
            <section class="content">
                <form action="{{ route('Create_RequirementBin') }}" method="post">
                    @csrf
                    <div class="modal fade" id="modal-xl-create">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Requirement Bin</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="height: 500px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Title" tabindex="1" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Description</label>
                                                <textarea type="text" class="form-control" id="inputField" name="description" placeholder="Description"
                                                    tabindex="1" style="height: 100px;"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Deadline</label>
                                                <input type="datetime-local" class="form-control" id="deadline"
                                                    name="deadline" tabindex="1" value="{{ date('Y-m-d 00:00:00') }}"
                                                    min="{{ date('Y-m-d 00:01:00') }}" data-parsley-excluded="true">

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Status</label>
                                                <input class="form-control" name="status" type="text"
                                                    value="ONGOING" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit"
                                        class="btn btn-outline-primary swalDefaultSuccess">Save</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </form>
            </section>
        </div>

        <!-- Footer Container -->
        <footer class="main-footer">
            <strong>Faculty Records & Monitoring System &copy; 2024 <a href="https://pup.edu.ph">PUPQC.</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.2.0
            </div>
        </footer>
    </div>

    <script>
        function openEditModal(title, description, binId, deadline, status) {
            // Set the values in the form fields
            document.getElementById('editForm').elements['title'].value = title;
            document.getElementById('editForm').elements['description'].value = description;
            document.getElementById('editForm').elements['deadline'].value = deadline;
            document.getElementById('editForm').elements['status'].value = status;
            document.getElementById('editForm').action = "{{ route('update_requirementbins', '') }}" + binId;

            // Open the edit modal
            $('#modal-xl-edit').modal('show');
        }

        // Add event listeners to close the modal
        document.getElementById('closeModalButton').addEventListener('click', function() {
            $('#modal-xl-edit').modal('hide');
        });

        document.getElementById('cancelButton').addEventListener('click', function() {
            $('#modal-xl-edit').modal('hide');
        });
    </script>

    <script>
        function openViewModal(title, description, deadline, status) {
            // Set the values in the form fields
            document.getElementById('viewForm').elements['title'].value = title;
            document.getElementById('viewForm').elements['description'].value = description;
            document.getElementById('viewForm').elements['deadline'].value = deadline;
            document.getElementById('viewForm').elements['status'].value = status;

            // Open the view modal
            $('#modal-xl-view').modal('show');
        }

        // Add event listeners to close the modal
        document.getElementById('View_closeModalButton').addEventListener('click', function() {
            $('#modal-xl-view').modal('hide');
        });

        document.getElementById('View_cancelButton').addEventListener('click', function() {
            $('#modal-xl-view').modal('hide');
        });
    </script>
@endsection
