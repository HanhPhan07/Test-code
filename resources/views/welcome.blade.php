<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- Google Font -->
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
          {{-- <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css"> --}}

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 10px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 20px;
            }

            .title {
                font-size: 30px;
                text-align: left;
                margin-left: 30px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .container {
                align-content: justify;
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                margin: 20px;
                width: 800px;
            }
            .row {
                margin: 5px;
            }.hide{
                display: none;
            }
            .show{
                display: block;
            }



        </style>
    </head>
    <body>
            <div class="content">
                <div class="title">
                    Find Staff
                </div>
                <div class="container">
                    <form role="form"  >
                        <p>Fromo Entry Date</p>
                        <div id=error>

                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <input class="form-control" placeholder="Nhập số ngày" name="date_from" id="date_from" type="number" value="" autofocus>
                            </div>
                            <div class="col-md-2">
                                <span>days</span>
                            </div>
                            <div class="col-md-2">
                                <span>Over or equal >=</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <input class="form-control" placeholder="Nhập số ngày" name="date_to" id="date_to" type="number" value="">
                            </div>
                            <div class="col-md-2">
                                <span>days</span>
                            </div>
                            <div class="col-md-2">
                                <span>Under <</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span>Email</span>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Nhập email" name="email" id="email" type="email" value="">
                            </div>
                           </div>
                        <div class="form-group">
                            <div  class="col-xs-6 col-sm-6">
                                <button type="submit" class="btnsearch btn-lg btn-primary btn-block" id="btnsearch" style="float: right;">Submit</button>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <a type="submit"  id="btnCancel" class="btncancel btn-lg btn-primary btn-block">Clear</a>
                            </div>
                        </div>
                        {!! csrf_field() !!}
                    </form>
                </div id="error_message">
                <div class="box-body">
                    <table id="first_data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>JapaneseName</th>
                                <th>Email</th>
                                <th>Entry Date</th>
                                <th>Day of week</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $item)
                                <tr>
                                    <td>{{$item->StaffID}}</td>
                                    <td>{{$item->StaffName}}</td>
                                    <td>{{$item->JapaneseName}}</td>
                                    <td>{{$item->Email}}</td>
                                    <td>{{$item->TrialEntryDate}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table id="data_test" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>JapaneseName</th>
                                <th>Email</th>
                                <th>Entry Date</th>
                                <th>Day of week</th>
                            </tr>
                        </thead>
                        <tbody id="data">

                        </tbody>
                    </table>

                </div>
            </div>
        {{-- <!-- Bootstrap 3.3.7 -->
        <script src="bootstrap/dist/js/bootstrap.min.js"></script> --}}
        {{-- <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>--}}


        <!-- jQuery 3 -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- Sparkline -->
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap  -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll -->
        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- DataTables -->
        <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="dist/js/employee.js"></script>

        <script type="text/javascript">
            $(function() {
                $('#example2').DataTable()
                $('#example1').DataTable({
                "language":{
                    "lengthMenu":     "Hiển thị _MENU_ kết quả",
                    "emptyTable":     "Vui lòng thêm dữ liệu !",
                    "zeroRecords":    "Không có kết quả tìm thấy !",
                    "info":           "Hiển thị _START_ từ _END_ của _TOTAL_ kết quả",
                    "infoEmpty":      "Hiển thị 0 đến 0 của 0 kết quả",
                    "infoFiltered":   "(Lọc từ _MAX_ kết quả)",
                    "paginate": {
                        "first":      "Đầu",
                        "last":       "Cuối",
                        "next":       "Tiến",
                        "previous":   "Lùi"
                    },
                }
                })
            })
        </script>
    </body>
</html>

