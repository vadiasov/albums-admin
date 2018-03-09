@extends('layouts.admin.main')

@section('title', 'Albums')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Albums</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Albums</li>
            </ol>
            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            {{--<li><a href="#">Tables</a></li>--}}
            {{--<li class="active">Data tables</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Albums </h3>
                            <a href="{{ route('admin/albums/create') }}" class="btn btn-info pull-right">Create</a>
                            @if (session('status'))
                                <h4 class="alert alert-success" style="margin-top: 20px;">
                                    {{ session('status') }}
                                </h4>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Artist</th>
                                    <th>Name</th>
                                    <th>Release</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($albums as $album)
                                    <tr>
                                        <td>{{ $album->id }}</td>
                                        <td>{{ $artists[$album->artist_id]->name }}</td>
                                        <td>{{ $album->title }}</td>
                                        <td>{{ $album->release_date }}</td>
                                        <td>{{ $album->created_at }}</td>
                                        <td>{{ $album->updated_at }}</td>
                                        <td>
                                            <a href="{{action('\Vadiasov\Upload\Controllers\UploadController@upload', ['albumsAdmin', $album->id])}}"
                                                title="Add Tracks">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                            <a href="{{action('\Vadiasov\TracksAdmin\Controllers\TracksController@index', $album->id)}}">
                                                <i class="fa fa-music" aria-hidden="true"></i></a>
                                            <a href="{{action('\Vadiasov\AlbumsAdmin\Controllers\AlbumsController@edit', $album->id)}}">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="{{action('\Vadiasov\AlbumsAdmin\Controllers\AlbumsController@destroy', $album->id)}}">
                                                <i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Artist</th>
                                    <th>Name</th>
                                    <th>Release</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        })
    </script>
@endsection