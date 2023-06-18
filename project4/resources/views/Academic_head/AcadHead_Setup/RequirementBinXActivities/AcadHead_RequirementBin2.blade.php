<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title with PUP logo -->
        <link rel="icon" href="{{ asset('img/pup.png') }}">
        <title>PUPQC | Faculty Records and Monitoring System</title>

<!-- CSS LIST -->

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/farms.min.css') }}">

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">

        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

        <!-- Flowbite Framework -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />

         <!-- Pallete style -->
        <link rel="stylesheet" href="{{ asset('css/farms.pallete.css') }}">

		<!-- Dependencies for date picker -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<!-- JAVASCRIPT LIST -->


        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>

        $.widget.bridge('uibutton', $.ui.button)
        </script>

        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

        <!-- Sparkline -->
        <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>

        <!-- JQVMap -->
        <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>

        <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

        <!-- jQuery Knob Chart -->
        <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>

        <!-- daterangepicker -->
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>

        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <!-- Summernote -->
        <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        <!-- Main Script -->
        <script src="{{ asset('js/farms.js') }}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>

        <!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

        <!-- Flowbite Js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

        <!-- FARMS DB 1-->
        <script src="{{ asset('js/pages/dashboard.js') }}"></script>

        <!-- FARMS DB 2 -->
        <script src="{{ asset('js/pages/dashboard2.js') }}"></script>

        <!-- DB Chart for Summary  -->
        <script src="{{ asset('js/db_summaryChart.js') }}"></script>

        <!-- SWEETALERTS SCRIPTS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

{{-- TOP NAVBAR --}}
        @include('NavigationBar.Top_NavBar')

{{-- LEFT NAVBAR --}}
        @include('NavigationBar.Left_NavBar')

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
                                    <button data-toggle="modal" data-target="#modal-xl-create" type="button" class="px-4 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Create Requirement Bin</button>
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
                                                <td>{{ $requirementbin->status }}</td>
                                                <td class="text-center">
                                                <form method="POST" action="{{ route('delete_requirementbins', $requirementbin->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                <button data-toggle="modal" data-target="#modal-xl" type="button" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View</button>
                                                <button type="button" onclick="openEditModal('{{ $requirementbin->title }}', '{{ $requirementbin->description }}',  '{{ $requirementbin->id }}', '{{ $requirementbin->deadline}}', '{{ $requirementbin->status }}') " class="px-3 py-2 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300">Edit</button>
                                                <button type="button" class="px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 delete-button" title="Delete">Delete</button>
                                                </form>
                                            </td>
                                            </tr>
                                        @endforeach
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
                                        <h4 class="modal-title">Edit Requirement Bin</h4>
                                        <button type="button" class="close" data-dismiss="modal" id="cancelButton" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="height: 500px;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="required-input">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" tabindex="1" required="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Description</label>
                                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" tabindex="1" style="height: 100px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="datetimepicker">Select a date and time:</label>
                                                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"  name="deadline" data-target="#datetimepicker"/>
                                                            <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="required-input" >Status</label>
                                                    <select id="status" name="status" class="form-control select2">
                                                        <option disabled selected>List of status</option>
                                                        <option value="Activity">ONGOING</option>
                                                        <option value="Meeting">PENDING</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger" id="closeModalButton" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save changes</button> </div>
                                </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>
                </section>

                <!--Create Modal-->
                <section class="content">
                <form action = "{{route('Create_RequirementBin')}}" method="post">
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
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Title" tabindex="1" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Description</label>
                                                <textarea type="text" class="form-control" id="inputField" name="description" placeholder="Description" tabindex="1" style="height: 100px;"></textarea>
                                            </div>
                                        </div>
                                        
                               
                                        <div class="row">
											<div class="form-group col-md-12">
												<label for="datetimepicker">Select a date and time:</label>
												<div class="input-group date" id="datetimepicker" data-target-input="nearest">
														<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker"/>
														<div class="input-group-append"c data-toggle="datetimepicker">
														<div class="input-group-text"><i class="fa fa-calendar"></i></div>
													</div>
												</div>
											</div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Status</label>
                                                <input class="form-control" name="status" type="text" value="ONGOING" readonly>
                                            </div>
                                        </div>   
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save</button>
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
        document.getElementById('closeModalButton').addEventListener('click', function () {
            $('#modal-xl-edit').modal('hide');
        });

        document.getElementById('cancelButton').addEventListener('click', function () {
            $('#modal-xl-edit').modal('hide');
        });
    </script>

    
<!-- Script for Date picker -->
<script src="{{ asset('js/farms.datepicker.js') }}"></script>

    </body>
    </html>


     


