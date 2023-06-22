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
                            <h1 class="m-0">Bin Setup</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="container">
                <div class="text-right">
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Assign
                        Requirement</button>
                </div> <br>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="col-3">Requirement Type</th>
                            <th scope="col" class="col-5">Notes</th>
                            <th scope="col" class="col-3">File Format</th>
                            <th scope="col" class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requirements as $requirement)
                            <tr>
                                <th scope="row">{{ $requirement->title }}</th>
                                <td>{{ $requirement->notes }}</td>
                                <td>{{ $requirement->file_format }}</td>
                                <td> <button type="button" class="btn btn-danger " data-toggle="dropdown"
                                        aria-expanded="false">
                                        <h1>... </h1>
                                    </button>
                                    <div class="dropdown-menu">

                                        <button data-toggle="modal" type="button"
                                            class="dropdown-item px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View</button>
                                        <button type="button"
                                            class="dropdown-item px-3 py-2 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300">Edit</button>
                                        <button type="button"
                                            class="dropdown-item px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 delete-button"
                                            title="Delete">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"><button type="button" class="btn btn-outline-primary btn-lg btn-block"
                                    data-toggle="modal" data-target="#modal-xl-create">+Add
                                    Requirement</button></td>
                        </tr>

                    </tbody>
                </table>
            </section>
            <div class="d-flex justify-content-between">
                <a href="/RequirementBin" class="btn btn-outline-danger btn-lg" id="lower_button">Back</a>
                <button type="button" class="btn btn-outline-primary btn-lg" id="lower_button">Setup</button>
                <style>
                    .d-flex {
                        gap: 1rem;
                    }

                    #lower_button {
                        margin-left: 10px;
                        margin-right: 10px;
                        margin-top: 8px;
                        margin-bottom: 8px;
                    }
                </style>
            </div>

            <!-- Create Requirement modal -->
            <section class="content">
                <form action="{{ route('Setup_RequirementBin', $bin_id) }}" method="post">
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
                                                <label class="required-input">Requirement Type</label>
                                                <select id="type" name="type" class="form-control form-control-lg">
                                                    <option disabled selected>List of Requirement type/s</option>
                                                    @foreach ($requirementtypes as $types)
                                                        <option value="{{ $types->id }}">{{ $types->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Notes</label>
                                                <textarea type="text" class="form-control" id="notes" name="notes" placeholder="Description" tabindex="1"
                                                    style="height: 100px;"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Please select acceptable file format:</label>
                                                <div class="row" id="checkbox_containter">
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-0_0">
                                                        <label class="form-check-label" for="checkbox-0_0">Checkbox</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-0_1">
                                                        <label class="form-check-label" for="checkbox-0_1">Checkbox</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-0_2">
                                                        <label class="form-check-label" for="checkbox-0_2">Checkbox</label>
                                                    </div>
                                                </div>
                                                <div class="row" id="checkbox-containter">
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-1_0">
                                                        <label class="form-check-label"
                                                            for="checkbox-1_0">Checkbox</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-1_1">
                                                        <label class="form-check-label"
                                                            for="checkbox-1_1">Checkbox</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-1_2">
                                                        <label class="form-check-label"
                                                            for="checkbox-1_2">Checkbox</label>
                                                    </div>
                                                </div>
                                                <div class="row" id="checkbox_containter">
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-2_0">
                                                        <label class="form-check-label"
                                                            for="checkbox-2_0">Checkbox</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-2_1">
                                                        <label class="form-check-label"
                                                            for="checkbox-2_1">Checkbox</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-2_2">
                                                        <label class="form-check-label"
                                                            for="checkbox-2_2">Checkbox</label>
                                                    </div>
                                                </div>
                                                <div class="row" id="checkbox_containter">
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-3_0">
                                                        <label class="form-check-label"
                                                            for="checkbox-3_0">Checkbox</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-3_1">
                                                        <label class="form-check-label"
                                                            for="checkbox-3_1">Checkbox</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-3_2">
                                                        <label class="form-check-label"
                                                            for="checkbox-3_2">Checkbox</label>
                                                    </div>
                                                </div>
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


    <style>
        .col-md-4 {
            padding-right: 150px;
            padding-left: 150px;
        }
    </style>
@endsection
