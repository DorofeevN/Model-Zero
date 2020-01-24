@extends('layouts.admin')

@section('content')

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">




    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Category list</div>
        <div class="card-body">
            <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>Родительская категория</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Update_at</th>
            <th>Deleted_at</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Id</th>
            <th>Родительская категория</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Update_at</th>
            <th>Deleted_at</th>
        </tr>
        </tfoot>

    @foreach($paginator as $item)
        @php /**@var \App\Models\BlogCategory $item */ @endphp
        {{--<table>--}}
        {{--<tr> <td>{{$item->id}}</td>--}}
        {{--<td>{{$item->title}}</td>--}}
        {{--<td>{{$item->slug}}</td>--}}
        {{--</tr>--}}
        {{--</table>--}}
        <tbody>
        <tr>
            <td>{{$item->id}}</td>
            <td @if(in_array($item->parent_id, [0,1])) style="color:#ccc" @endif>
                {{ $item->parentTitle }} </td>
            <td><a href="{{ route('blog.admin.categories.edit', $item->id)  }}">{{$item->title}}</a></td>
            <td>@if(empty($item->description)) -  @elseif($item->description) @endif</td>
            <td>@if(empty($item->created_at)) -  @elseif($item->created_at) @endif</td>
            <td>@if(empty($item->updated_at)) -  @elseif($item->updated_at) @endif</td>
            <td>@if(empty($item->deleted_at)) -  @elseif($item->deleted_at) @endif</td>
        </tr>
        </tbody>
        @endforeach
    </table>
            </div>
         @if($paginator->total() > $paginator->count())
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-body">
                             {{$paginator->links()}}
                         </div>
                     </div>
                 </div>
             </div>
          @endif

        </div>
        <div id="row" class="col-sm-12 col-md-2"><a class="btn btn-primary" href="{{route('blog.admin.categories.create')}}">Добавить</a></div>
        <br>

        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <p class="small text-center text-muted my-5">
        <em>More table examples coming soon...</em>
    </p>

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Your Website 2019</span>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.content-wrapper -->



    {{--<!-- Bootstrap core JavaScript-->--}}
    {{--<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>--}}

    {{--<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
    {{--<!-- Core plugin JavaScript-->--}}
    {{--<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>--}}
    {{--<!-- Page level plugin JavaScript-->--}}
    {{--<!-- Custom scripts for all pages-->--}}
    {{--<script src="{{ asset('js/sb-admin.min.js')}}"></script>--}}
    {{--<!-- Demo scripts for this page-->--}}
    {{--<script src="{{ asset('js/demo/datatables-demo.js')}}"></script>--}}

@endsection