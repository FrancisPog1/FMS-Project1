@extends('layouts.Faculty_master')


{{-- CONTENTS --}}  
@section('content')  

        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row-col-sm-6 mb-2">
                        <div class="col-md-6 ml-4">
                            <h1 class="m-0">Activities</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="container">
                <div class="mr-5 ml-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">List of activities</h3>
                            <!-- Search function --->
                            <div class="text-right">
                                <div class="form-inline float-right">
                                    <div class="input-group" data-widget="sidebar-search">
                                        <input class="form-control
                                            form-control-sidebar px-4 py-2
                                            text-sm font-medium" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-sidebar">
                                                <i class="fas fa-search fa-fw"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                            <select name="dataTable_length" aria-controls="dataTable" class="ml-5 col-1
                                custom-select custom-select-sm form-control
                                form-control-sm">
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
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Re-opening of the Online Application for Graduation
                                        </td>
                                        <td>
                                            Flag Raising Ceremony
                                        </td>
                                        <td>
                                            <button type="button" class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-red-800">Cancelled</button>
                                        </td>
                                        <td>September 27, 2022 12:00 AM - November 1, 2022 11:59 PM</td>
                                        <td class="text-center">
                                            <button data-toggle="modal" data-target="#modal-xl" type="button" class="px-3 py-2
                                                text-sm font-medium text-center
                                                text-white bg-blue-700
                                                rounded-lg hover:bg-blue-800
                                                focus:ring-4 focus:outline-none
                                                focus:ring-blue-300
                                                dark:bg-blue-600
                                                dark:hover:bg-blue-700
                                                dark:focus:ring-blue-800">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="text-col-1" style="font-size:
                                    .9rem;">
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
                <div class="modal fade" id="modal-xl">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Activities </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="container col-sm-5 pr-3" style="padding: 80px; box-shadow: 0px
                                        0px 20px rgba(0, 0, 0, 0.1);">
                                        <p style="font-size: 1.2rem;">
                                            <b>Re-opening of online graduation</b>
                                        </p> <br>
                                        <p style="margin-left: 20px;">
                                            Posted by: <b>Academic Head</b> <br>
                                            Required to attend: <b>Flag Raising Ceremony</b> <br>
                                            Description: <b>Re-opening of the Online Application for Graduation</b> <br><br>
                                            <b>Event hasn't started yet. Please wait.</b>
                                        </p>
                                    </div>
                                    <div class="container col-sm-5" style="padding: 80px; box-shadow: 0px
                                        0px 20px rgba(0, 0, 0, 0.1);">
                                        <p style="font-size: 1.2rem;">
                                            <b>Activity Details</b>
                                        </p> <br>
                                        <p style="margin-left: 20px;">
                                            Start time: <b>12pm</b> <br>
                                            End time: <b>3pm</b> <br>
                                            Location: <b>Via Zoom meet</b> <br><br>
                                            Status: <button type="button" class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-red-800">Cancelled</button>
                                        </p>

                                        <button type="button" class="btn btn-outline-primary">View Memo dw</button>

                                    </div>
                                </div>                       
                            </div>

                            <div class="modal-footer
                                    justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

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
    @endsection

