@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="img/pup.png" height="60" width="60">
        </div>

        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row-col-sm-6 mb-2">
                        <div class="col-md-3 ml-4">
                            <h1 class="m-0">User</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="container">
                <div class="mr-5 ml-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">List of Users</h3>
                            <div class="text-right">
                                <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                                    class="px-4 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Add
                                    New User</button>
                            </div>
                        </div>

                        <div class="card-header row">
                            <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .9rem;">Show entries</p>
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
                                        <th>Email</th>
                                        <th style="width: 25%;">Role</th>
                                        <th style="width: 15    %;">Status</th>
                                        <th class="text-center" style="width: 25%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->user_role }}</td>
                                            <td>Inactive</td>

                                            <td class="text-center">
                                                <form method="POST" action="{{ route('delete_users', $user->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">

                                                    <button data-toggle="modal"
                                                        onclick="openViewModal('{{ $user->email }}')"
                                                        data-target="#modal-xl-view" type="button"
                                                        class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View</button>
                                                    <button data-toggle="modal"
                                                        onclick="openEditModal('{{ $user->email }}', '{{ $user->id }}')"
                                                        data-target="#modal-xl-edit" type="button"
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

            <section class="content">
                <form id="viewForm" action="" method="post">
                    <div class="modal fade" id="modal-xl-view">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">View User</h4>
                                    <button type="button" class="close" data-dismiss="modal" id="View_closeModalButton"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="height: 400px;">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    tabindex="1" readonly>
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                                        id="View_cancelButton">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </form>
            </section>


            <section class="content">
                <form id="editForm" action="" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal fade" id="modal-xl-edit">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit User</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        id="Edit_closeModalButton" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body" style="height: 400px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="example@gmail.com" tabindex="1" required="">
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger" id="Edit_cancelButton"
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


            <section class="content">
                <form action="{{ route('register_user') }}" method="post">
                    @csrf
                    <div class="modal fade" id="modal-xl-create">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="height: 400px;">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">User Role</label>
                                                <select id="role" name="role" class="form-control select2">
                                                    <option disabled selected>List of User role/s</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="example@gmail.com" tabindex="1" required="">
                                                <span class="text-danger">
                                                    @foreach ($errors->get('email') as $message)
                                                        <p>{{ $message }}</p>
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" tabindex="1">
                                                <span class="text-danger">
                                                    @foreach ($errors->get('password') as $message)
                                                        <p>{{ $message }}</p>
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation" tabindex="1">
                                                <span class="text-danger">
                                                    @foreach ($errors->get('password_confirmation') as $message)
                                                        <p>{{ $message }}</p>
                                                    @endforeach
                                                </span>
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
        function openEditModal(email, userId) {
            // Set the values in the form fields
            document.getElementById('editForm').elements['email'].value = email;
            document.getElementById('editForm').action = "{{ route('update_users', '') }}" + userId;

            // Open the edit modal
            $('#modal-xl-edit').modal('show');
        }

        // Add event listeners to close the modal
        document.getElementById('Edit_closeModalButton').addEventListener('click', function() {
            $('#modal-xl-edit').modal('hide');
        });

        document.getElementById('Edit_cancelButton').addEventListener('click', function() {
            $('#modal-xl-edit').modal('hide');
        });
    </script>


    <script>
        function openViewModal(email) {
            // Set the values in the form fields
            document.getElementById('viewForm').elements['email'].value = email;
            // Open the edit modal
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
