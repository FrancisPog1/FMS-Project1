@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')

    <!-- !! START LINE !! -- OLD UI ELEMENTS B4 MERGE, I DIDNT DELETE SO THE BACKEND CAN TRACK-->
        {{-- <style>
            .d-flex {
                gap: 1rem;
            }

            #lower_button {
                margin-left: 10px;
                margin-right: 10px;
                margin-top: 8px;
                margin-bottom: 8px;
            }
            .col-md-4 {
                padding-right: 150px;
                padding-left: 150px;
            }
        </style>

        <div class="wrapper">
            <div class="content-wrapper">
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

                <!-- Navigation buttons -->
                <div class="d-flex justify-content-between">
                    <a href="/RequirementBin" class="btn btn-outline-danger btn-lg" id="lower_button">Back</a>
                    <button type="button" class="btn btn-outline-primary btn-lg" id="lower_button">Setup</button>

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
        </div> --}}

        {{-- test elements about upload tags. --}}
        {{-- <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Upload Requirement</h1>
                    <p>Please upload your requirement file here.</p>
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        <input type="file" name="requirement">
                        <input type="submit" value="Upload">
                    </form>
                </div>
                <div class="col-md-6">
                    <h1>Upload Requirement</h1>
                    <p>Please upload your requirement file here.</p>
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        <input type="file" name="requirement">
                        <input type="submit" value="Upload">
                    </form>
                </div>
            </div>
        </div> --}}
    <!-- !! END LINE !! -- OLD UI ELEMENTS B4 MERGE, I DIDNT DELETE SO THE BACKEND CAN TRACK-->


    {{-- START TAG --}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row-col-sm-6 mb-2">
                    <div class="col-md-3 ml-2">
                        <h1 class="mt-4">Requirement Setups</h1>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <!-- Content Body (Page Body) -->
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    {{-- column row on data table --}}
                    <div class="col">
                        <div class="card">
                            {{-- Table header --}}
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="flex-wrap">
                                        <b><h1 class="ml-1 mt-2">Please setup the requirements for the [Requirement No.1] </h1> </b>
                                    </div>

                                    <div class="text-right">
                                        <button type="button" data-toggle="modal" data-target="#modal-xl-create"
                                                class="px-2 py-2 text-sm rounded-lg text-pal-1 hover:bg-gray-200">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- Table body --}}
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead class="pal-1 text-col-2">
                                        <tr>
                                            <th>Requirement Type</th>
                                            <th style="width:40%;">Notes</th>
                                            <th class="text-center" style="width:20%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>title</td>
                                            <td>description</td>
                                            <td class="text-center">
                                                <button data-toggle="modal" onclick="" data-target="#modal-xl-view" type="button" class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                                <button type="button" onclick="" class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                                <button type="button" class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 delete-button" title="Delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="col ">
                        <div class="m-4">
                            <div class="text-center">
                                {{-- Search bar --}}
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="e.g. SALN" />
                                    <span class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                                <br>

                                {{-- assign button --}}
                                <button data-toggle="modal" data-target="#modal-xl-assign" type="button"
                                    class="px-5 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">
                                    Assign a requirement
                                </button>
                            </div>

                            <br>

                            {{-- column row on button back and restore --}}
                            <div class="col">
                                <div class="text-right">
                                    <a type="button" href="/RequirementBin"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-pal-1 hover:bg-gray-200 text-center mr-2 mb-2">

                                        <i class="fa fa-arrow-left" ></i>
                                    </a>
                                    <button type="button" data-toggle="modal" data-target="#modal-xl-restore"
                                            class="px-2 py-2 text-sm text-center rounded-lg hover:bg-gray-200 text-center mr-2 mb-2" style="color: #28a745">
                                            <i class="fa fa-undo"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- specific user match in specific requirement --}}
                    <div class="col p-auto">
                        <div class="m-auto p-4 bg-gray-200 rounded-md">
                            <div class="d-flex">
                                <span class="d-block text-bold" style="font-size: 1.2rem">
                                    Requirements of:
                                </span>
                            </div>
                            <br>
                            <div class="user-panel d-flex">
                                <div class="image mt-2">
                                    <img src="https://rb.gy/1islm"
                                        class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info m-auto">
                                    <span class="d-block text-pal-1 text-bold">Irynne Gatchalian</span>
                                    <span class="d-block text-pal-1 text-regular" style="font-size: .8rem;">Faculty Instructor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <section class="content">
            <form action="{{ route('Setup_RequirementBin', $bin_id) }}" method="post">
                @csrf
                <div class="modal fade" id="modal-xl-create">
                    <div class="modal-dialog modal-dialog-centered modal-l">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Create Requirement</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row justify-content-between p-6">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="required-input">Requirement Type</label>
                                                <select id="type" name="type" class="form-control form-control-md">
                                                    <option disabled selected>List of Requirement type/s</option>
                                                    @foreach ($requirementtypes as $types)
                                                        <option value="{{ $types->id }}">{{ $types->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Notes</label>
                                                <textarea type="text" class="form-control" id="notes" name="notes" placeholder="Description" tabindex="1"
                                                    style="height: 100px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group ml-3">
                                                <label>Please select acceptable file format:</label>
                                                <div class="row ml-4" id="checkbox_containter">
                                                    <div class="form-group col">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-0_0">
                                                        <label class="form-check-label" for="checkbox-0_0">.PDF</label>

                                                        <br>
                                                        <input type="checkbox" class="form-check-input" id="checkbox-0_0">
                                                        <label class="form-check-label" for="checkbox-0_0">.DOC/DOCX</label>

                                                        <br>
                                                        <input type="checkbox" class="form-check-input" id="checkbox-0_0">
                                                        <label class="form-check-label" for="checkbox-0_0">.PPT/PPTX</label>
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-0_0">
                                                        <label class="form-check-label" for="checkbox-0_0">.JPG/JPEG</label>

                                                        <br>
                                                        <input type="checkbox" class="form-check-input" id="checkbox-0_0">
                                                        <label class="form-check-label" for="checkbox-0_0">.PNG</label>

                                                        <br>
                                                        <input type="checkbox" class="form-check-input" id="checkbox-0_0">
                                                        <label class="form-check-label" for="checkbox-0_0">.XLS/XLSX</label>
                                                    </div>
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
                                    class="btn btn-outline-success swalDefaultSuccess">Create</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>
        </section>

        <!-- Assigning Modal -->
        <section class="content">
            <form action="{{ route('Setup_RequirementBin', $bin_id) }}" method="post">
                @csrf
                <div class="modal fade" id="modal-xl-assign">
                    <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 700px">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Assign requirements</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body card-body">

                                <div class="row justify-content-between">

                                    <div class="row col-md-12">

                                        <div class="col-4 form-group">
                                            <select id="type" name="type" class="form-control form-control-md">
                                                <option disabled selected>Filter by Role</option>
                                                {{-- @foreach ($requirementtypes as $types)
                                                    <option value="{{ $types->id }}">{{ $types->title }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            {{-- Search bar --}}
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search a user" />
                                                <span class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        {{-- Check all button --}}
                                        <div class="col-2 mt-2">
                                            <input type="checkbox" class="check-all-assign" id="check-all-assign">
                                            <label for="check-all-assign">Assign all</label>
                                        </div>

                                    </div>

                                    <div class="col-md-12 form-group">
                                        {{-- Table body --}}
                                        <div class="card-body p-0">
                                            <table class="table table-striped">
                                                <thead class="pal-1 text-col-2">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th style="width:40%;">Email</th>
                                                        <th style="width:20%;">Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="ml-3">
                                                                <input type="checkbox" class="form-check-input" id="checkbox-0_0">
                                                                <label class="form-check-label" for="checkbox-0_0">Faculty 1</label>
                                                            </div>

                                                        </td>
                                                        <td>faculty@pupqc.com</td>
                                                        <td>Faculty</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-danger"
                                    data-dismiss="modal">Close</button>
                                <button type="submit"
                                    {{-- Should have a modal for success assign in this element --}}
                                    class="btn btn-outline-success swalDefaultSuccess">Assign</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>
        </section>

        <!-- Restoring Modal -->
        <section class="content">
            <form action="{{ route('Setup_RequirementBin', $bin_id) }}" method="post">
                @csrf
                <div class="modal fade" id="modal-xl-restore">
                    <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 700px">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Restore requirements</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body card-body">

                                <div class="row justify-content-between">

                                    {{-- Check all button --}}
                                    <div class="ml-2 mt-2">
                                        <label for="check-all-restore">Select/unselect all options: </label>
                                        <input type="checkbox" class="check-all-restore ml-2" id="check-all-restore">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        {{-- Table body --}}
                                        <div class="card-body p-0">
                                            <table class="table table-striped">
                                                <thead class="pal-1 text-col-2">
                                                    <tr>
                                                        <th>Requirement Type</th>
                                                        <th style="width:40%;">File format</th>
                                                        <th style="width:20%;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="ml-3">
                                                                <input type="checkbox" class="form-check-input" id="checkbox-0_0">
                                                                <label class="form-check-label" for="checkbox-0_0">SALN</label>
                                                            </div>

                                                        </td>
                                                        <td>pdf, docs, xls.</td>
                                                        <td>
                                                            <button type="button"
                                                                class="ml-2 px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 delete-button"
                                                                title="Delete">

                                                                <i class="far fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-danger"
                                    data-dismiss="modal">Close</button>
                                <button type="submit"
                                    {{-- Should have a modal for success assign in this element --}}
                                    class="btn btn-outline-success swalDefaultSuccess">Restore</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>
        </section>

    </div>

    <script>

        //Function to check all checkboxes on ASSIGN
        $(document).ready(function() {
        // Check
        $("#check-all-assign").on("click", function() {
            if ($(this).prop("checked")) {
            $("input[type='checkbox']").prop("checked", true);
            } else {
            $("input[type='checkbox']").prop("checked", false);
            }
        });

        // Uncheck
        $("input[type='checkbox']").on("change", function() {
            if (!$(this).prop("checked")) {
            $("#check-all-assign").prop("checked", false);
            }
        });
        });



        //Function to check all checkboxes on RESTORE
        $(document).ready(function() {
        // Check
        $("#check-all-restore").on("click", function() {
            if ($(this).prop("checked")) {
            $("input[type='checkbox']").prop("checked", true);
            } else {
            $("input[type='checkbox']").prop("checked", false);
            }
        });

        // Uncheck
        $("input[type='checkbox']").on("change", function() {
            if (!$(this).prop("checked")) {
            $("#check-all-restore").prop("checked", false);
            }
        });
        });

    </script>


@endsection
