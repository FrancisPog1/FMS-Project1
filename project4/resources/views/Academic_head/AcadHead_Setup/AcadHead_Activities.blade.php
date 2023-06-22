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
                        <div class="col-md-6 ml-4">
                            <h1 class="m-0">Activity Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="container">
                <div class="mr-5 ml-5">
                    <div class="card">

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

                            <div class="row float-right justify-content-between">
                                <div class="col-6">
                                    <input type="search" class="" placeholder=" Search activites" aria-controls=""
                                        style="width: 150px; height: 30px; font-size: .9rem; border-radius: 5px;">
                                </div>
                                <div class="col-6">
                                    <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                                        class="text-col-1 btn btn-success btn-m p-drop">
                                        Create activity &nbsp;
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Tables of roles -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead class="pal-1 text-col-2">
                                    <tr>
                                        <th style="width: 28%;">Title</th>
                                        <th style="width: 15%;">Type</th>
                                        <th style="width: 12%;">Status</th>
                                        <th style="width: 16%;">Date</th>
                                        <th class="text-center" style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td>
                                                {{ $activity->title }}
                                            </td>
                                            <td>
                                                {{ $activity->type_title }}
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">{{ $activity->status }}</button>
                                            </td>
                                            <td>
                                                {{ $activity->start_datetime }} - <br> {{ $activity->end_datetime }}
                                            </td>

                                            <td class="text-sm-center">
                                                <button data-toggle="modal" data-target="#modal-xl" type="button" class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                                <button data-toggle="modal" type="button" data-target="#modal-xl-edit" onclick="openEditModal('{{ $activity->title }}', '{{ $activity->type }}', '{{ $activity->description }}','{{ $activity->location }}', '{{ $activity->status }}', '{{ $activity->start_datetime }}', '{{ $activity->end_datetime }}', '{{ $activity->id }}')" class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                                <button id="button1" type="" class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <td class="dataTables_info text-col-1" id="dataTable_info" role="status"
                                        aria-live="polite" colspan="12" style="font-size: .9rem;">
                                        Showing x to x of x entries
                                    </td>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!--View Modal-->
            <section class="content">
                <div class="modal fade" id="modal-xl">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">View Modal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>One fine body&hellip;</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <h4 class="modal-title">Edit New Activity</h4>
                                    <button type="button" class="close" data-dismiss="modal" id="cancelButton"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="height: 500px;">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                <label class="required-input">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Title" tabindex="1" required="">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="required-input">Type</label>
                                                <select id="type" name="type" class="form-control select">
                                                    <option disabled selected>List of type/s</option>
                                                    @foreach ($activitytypes as $activitytype)
                                                        <option value="{{ $activitytype->id }}">
                                                            {{ $activitytype->title }}
                                                        </option>
                                                    @endforeach

                                                </select>
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
                                            <div class="form-group col-md-10">
                                                <label>Location</label>
                                                <input type="text" class="form-control" id="location"
                                                    name="location" placeholder="Location" tabindex="1"
                                                    required="">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label class="required-input">Status</label>
                                                <input class="form-control" name="status" id="status" type="text"
                                                    value="ONGOING" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 additional-input">
                                                <label class="required-input">Start time</label>
                                                <input type="datetime-local" class="form-control" id="start_datetime"
                                                    name="start_datetime" tabindex="1"
                                                    value="{{ date('Y-m-d 00:00:00') }}"
                                                    min="{{ date('Y-m-d 00:00:00') }}" data-parsley-excluded="true">
                                            </div>

                                            <div class="form-group col-md-6 additional-input">
                                                <label class="required-input">End time</label>
                                                <input type="datetime-local" class="form-control" id="end_datetime"
                                                    name="end_datetime" tabindex="1"
                                                    value="{{ date('Y-m-d 00:00:00') }}"
                                                    min="{{ date('Y-m-d 00:01:00') }}" data-parsley-excluded="true">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="" id="memo_upload">
                                                <div class="dz-default dz-message"><button class="dz-button"
                                                        type="button">Drop files here to upload</button></div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                                        id="closeModalButton">Close</button>
                                    <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save
                                        Changes</button>
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
                <form action="{{ route('Create_Activities') }}" method="post">
                    @csrf
                    <div class="modal fade" id="modal-xl-create">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Activity</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="height: 500px;">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                <label class="required-input">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Title" tabindex="1" required="">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="required-input">Type</label>
                                                <select id="type" name="type" class="form-control select">
                                                    <option disabled selected>List of type/s</option>
                                                    @foreach ($activitytypes as $activitytype)
                                                        <option value="{{ $activitytype->id }}">
                                                            {{ $activitytype->title }}</option>
                                                    @endforeach

                                                </select>
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
                                            <div class="form-group col-md-10">
                                                <label>Location</label>
                                                <input type="text" class="form-control" id="location"
                                                    name="location" placeholder="Location" tabindex="1"
                                                    required="">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="required-input">Status</label>
                                                <select id="status" name="status" class="form-control select2">
                                                    <option disabled selected>List of status</option>
                                                    <option value="ONGOING">ONGOING</option>
                                                    <option value="PENDING">PENDING</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 additional-input">
                                                <label class="required-input">Start time</label>
                                                <input type="datetime-local" class="form-control" id="start_datetime"
                                                    name="start_datetime" tabindex="1"
                                                    value="{{ date('Y-m-d 00:00:00') }}"
                                                    min="{{ date('Y-m-d 00:00:00') }}" data-parsley-excluded="true">
                                            </div>

                                            <div class="form-group col-md-6 additional-input">
                                                <label class="required-input">End time</label>
                                                <input type="datetime-local" class="form-control" id="end_datetime"
                                                    name="end_datetime" tabindex="1"
                                                    value="{{ date('Y-m-d 00:00:00') }}"
                                                    min="{{ date('Y-m-d 00:01:00') }}" data-parsley-excluded="true">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="" id="memo_upload">
                                                <div class="dz-default dz-message"><button class="dz-button"
                                                        type="button">Drop files here to upload</button></div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-dismiss="modal">Close</button>
                                    <button type="Submit"
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
        function openEditModal(title, type, description, location, status, start_datetime, end_datetime, id) {
            // Set the values in the form fields
            document.getElementById('editForm').elements['title'].value = title;
            document.getElementById('editForm').elements['description'].value = description;
            document.getElementById('editForm').elements['type'].value = type;
            document.getElementById('editForm').elements['location'].value = location;
            document.getElementById('editForm').elements['status'].value = status;
            document.getElementById('editForm').elements['start_datetime'].value = start_datetime;
            document.getElementById('editForm').elements['end_datetime'].value = end_datetime;
            document.getElementById('editForm').action = "{{ route('update_activities', '') }}" + id;

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
@endsection
