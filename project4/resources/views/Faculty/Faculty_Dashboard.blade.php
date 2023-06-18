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
                                <h1 class="m-0">Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <!-- Summary Cards -->
                <div class="col-md-12 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="container-fluid">
                                <div class="info-box">
                                    <span class="info-box-icon  pal-1 pal-1 text-col-2 elevation-1"><i class="fas fa-user-shield"></i></span>

                                    <div class="info-box-content">
                                    <span class="info-box-text">Total Requirement Bin</span>
                                    <span class="info-box-number">
                                        0
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="container-fluid">
                                <div class="info-box">
                                    <span class="info-box-icon pal-1 text-col-2 elevation-1"><i class="fas fa-folder"></i></span>

                                    <div class="info-box-content">
                                    <span class="info-box-text">Total Activities</span>
                                    <span class="info-box-number">
                                        0
                                        <small>%</small>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="container-fluid">
                                <div class="info-box">
                                    <span class="info-box-icon pal-1 text-col-2 pal-1 elevation-1"><i class="fas fa-user-graduate"></i></span>

                                    <div class="info-box-content">
                                    <span class="info-box-text">Total Meetings</span>
                                    <span class="info-box-number">
                                        0
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Graphs -->
                <div class="col-md-12 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="display: inline-block; width: 100%; border-top: 2px solid #800000;">
                                <div class="card-header">
                                    <label>Submitted Requirements Status</label>
                                </div>
                                <div>
                                    <canvas id="" width="324" height="269" style="display: block; box-sizing: border-box; height: 300px; width: 360px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="display: inline-block; width: 100%; border-top: 2px solid #800000;">
                                <div class="card-header">
                                    <label>Meeting Status</label>
                                </div>
                                <div>
                                    <canvas id="" width="324" height="269" style="display: block; box-sizing: border-box; height: 300px; width: 360px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="display: inline-block; width: 100%; border-top: 2px solid #800000;">
                                <div class="card-header">
                                    <label>Activity Status</label>
                                </div>
                                <div>
                                    <canvas id="" width="324" height="269" style="display: block; box-sizing: border-box; height: 300px; width: 360px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            
                <!-- List Tables for Activities and Meetings -->
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="container">
                                <div class="m-2">
                                    <div class="card" style="border-top: 2px solid #800000;">
                                        <div class="card-header">
                                            <h3 class="card-title mt-2">List of on-going activities</h3>
                                            <!-- Search function --->
                                            <div class="text-right">
                                                <div class="form-inline float-right">
                                                    <div class="input-group"
                                                        data-widget="sidebar-search">
                                                        <input class="form-control
                                                            form-control-sidebar px-4 py-2
                                                            text-sm font-medium border-0" type="search"
                                                            placeholder="Search"
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
                                            <p class="card-title ml-4 mt-1 row-cols-2"
                                                style="font-size: .95rem;">Show entries</p>
                                            <select name="dataTable_length"
                                                aria-controls="dataTable" class="ml-5 col-1
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
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Rosicar Escober
                                                        </td>
                                                        <td>
                                                            P
                                                        </td>
                                                        <td>
                                                            On-Going
                                                        </td>                
                
                                                        <td class="text-center">
                                                            <button data-toggle="modal"
                                                                data-target="#modal-xl"
                                                                type="button" class="px-3 py-2
                                                                text-sm font-medium text-center
                                                                text-white bg-blue-700
                                                                rounded-lg hover:bg-blue-800
                                                                focus:ring-4 focus:outline-none
                                                                focus:ring-blue-300
                                                               
                                                               
                                                               ">View</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="text-col-1" style="font-size:
                                                    .9rem;">
                                                    <tr>
                                                        <td>
                                                            <div class="col-sm-12">
                                                                <div class="dataTables_info"
                                                                    id="dataTable_info"
                                                                    role="status"
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
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="container">
                                <div class="m-2">
                                    <div class="card" style="border-top: 2px solid #800000;">
                                        <div class="card-header">
                                            <h3 class="card-title mt-2">List of on-going meetings</h3>
                                            <!-- Search function --->
                                            <div class="text-right">
                                                <div class="form-inline float-right">
                                                    <div class="input-group"
                                                        data-widget="sidebar-search">
                                                        <input class="form-control
                                                            form-control-sidebar px-4 py-2
                                                            text-sm font-medium border-0" type="search"
                                                            placeholder="Search"
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
                                            <p class="card-title ml-4 mt-1 row-cols-2"
                                                style="font-size: .95rem;">Show entries</p>
                                            <select name="dataTable_length"
                                                aria-controls="dataTable" class="ml-5 col-1
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
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Rosicar Escober
                                                        </td>
                                                        <td>
                                                            P
                                                        </td>
                                                        <td>
                                                            On-Going
                                                        </td>                
                
                                                        <td class="text-center">
                                                            <button data-toggle="modal"
                                                                data-target="#modal-xl"
                                                                type="button" class="px-3 py-2
                                                                text-sm font-medium text-center
                                                                text-white bg-blue-700
                                                                rounded-lg hover:bg-blue-800
                                                                focus:ring-4 focus:outline-none
                                                                focus:ring-blue-300
                                                               
                                                               
                                                               ">View</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="text-col-1" style="font-size:
                                                    .9rem;">
                                                    <tr>
                                                        <td>
                                                            <div class="col-sm-12">
                                                                <div class="dataTables_info"
                                                                    id="dataTable_info"
                                                                    role="status"
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
                            </div>
                        </div>
                    </div>
                </div>

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