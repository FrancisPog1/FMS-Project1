@extends('layouts.Director_master')

{{-- CONTENTS --}}
@section('content')
    <!-- Content Wrapper. Outer Container -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row-col-sm-6 mb-2">
                    <div class="col-md-6 ml-4">
                        <h1 class="m-0">Faculty Activity Types</h1>
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

                        <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                            class="text-col-1 btn btn-success btn-m p-drop float-right">
                            New activity type &nbsp;
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <!-- Tables of roles -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead class="pal-1 text-col-2">
                                <tr>
                                    <th style="width: 30%;">Title</th>
                                    <th style="width: 10%;">Category</th>
                                    <th style="width: 40%;">Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Annual Faculty Meeting
                                    </td>
                                    <td>
                                        Activity
                                    </td>
                                    <td>
                                        Meetings serve as one way to improve schools by enhancing teaching and learning.
                                    </td>

                                    <td class="text-sm-center">
                                        <button data-toggle="modal" data-target="#modal-xl" type="button"
                                            class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <td class="dataTables_info text-col-1" id="dataTable_info" role="status" aria-live="polite"
                                    colspan="12" style="font-size: .9rem;">
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



    </div>

    <!-- Footer Container -->
    <footer class="main-footer">
        <strong>director Records & Monitoring System &copy; 2024 <a href="https://pup.edu.ph">PUPQC.</a></strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.2.0
        </div>
    </footer>
    </div>
@endsection
