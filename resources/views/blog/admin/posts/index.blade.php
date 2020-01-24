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
                                <th>Автор</th>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Публикация</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Автор</th>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Публикация</th>
                            </tr>
                            </tfoot>

                            @foreach($paginator as $post)
                                @php /**@var \App\Models\BlogCategory $post */ @endphp
                                <tbody>
                                <tr
                                    @if($post->is_published) style="background-color: #ccc;"@endif>
                                    <td>{{ $post->id }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->category->title }}</td>
                                        <td><a href="{{ route('blog.admin.posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                                        <td>{{ $post->published_at ?
                                        \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : '' }}</td>
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
                <div id="row" class="col-sm-12 col-md-2"><a class="btn btn-primary" href="{{route('blog.admin.posts.create')}}">Создать</a></div>
                <br>

                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

<div class="row justify-content-center">
    <div class="col-md-12">
            @include ('blog.admin.posts.includes.result_messages')
    </div>
</div>

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




@endsection