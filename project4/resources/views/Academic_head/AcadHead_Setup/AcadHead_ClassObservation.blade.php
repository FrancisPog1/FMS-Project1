@extends('layouts.master')

@section('head')

        <!-- Unique CSS LIST -->

		<!-- Dependencies for date picker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection


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
                                <h1 class="m-0">Observations</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="container">
                    <div class="mr-5 ml-5">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">

<div class="form-group row">

	<label for="datetimepicker">Select a date and time:</label>
	<div class="input-group date" id="datetimepicker" data-target-input="nearest">
			<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker"/>
			<div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
			<div class="input-group-text"><i class="fa fa-calendar"></i></div>
		</div>
	</div>
</div>

								</div>

								<!-- Search function --->
                                <div class="text-right">
									<div class="row float-right">
										<div class="button-group row-col-3">
										  <button type="button" class="text-col-1 btn btn-block btn-warning btn-s p-drop">Pending</button>
										</div>
										<div class="button-group row-col-3">
										  <button type="button" class="text-col-1 btn btn-block btn-danger btn-s p-drop">Cancelled</button>
										</div>
										<div class="button-group row-col-3">
										  <button type="button" class="text-col-1 btn btn-block btn-info btn-s p-drop">Ongoing</button>
										</div>
										<div class="button-group row-col-3">
										  <button type="button" class="text-col-1 btn btn-block btn-success btn-s p-drop">Done</button>
										</div>
									</div>
                                </div>
                            </div>

                            <div class="card-header">
                                <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                                <select name="dataTable_length" aria-controls="dataTable" class="ml-5 col-1 custom-select custom-select-sm form-control form-control-sm">
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
                                            <th>Faculty</th>
                                            <th>Date of Observation</th>
                                            <th>Asgmt Code</th>
                                            <th>Subject Title</th>
                                            <th>Year & Sec</th>
                                            <th>Room</th>
                                            <th>Subject Schedule</th>
                                            <th>Status</th>
                                            <th class="text-center" style="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
												Rosicar Escober
											</td>
                                            <td>
												Jan 16, 2024
											</td>
                                            <td>
												P
											</td>
                                            <td>
												Comp Prog.
											</td>
                                            <td>
												BSIT 2-2
											</td>
                                            <td>
												ACAD - 202
											</td>
                                            <td>
												Tues - 11:30AM-12:00PM
											</td>
                                            <td>
												<button type="button" class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 text-center mr-2 mb-2">Cancelled</button>
											</td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#modal-xl" type="button" class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="text-col-1" style="font-size: .9rem;">
                                        <tr>
                                            <td>
                                                <div class="col-sm-12">
                                                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
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

        <!-- Local script for warning modals -->
        <script src="{{ asset('js/farms.swal.warning.modal.js') }}"></script>

		<!-- Script for Date picker -->
		<script src="{{ asset('js/farms.datepicker.js') }}"></script>

@endsection
