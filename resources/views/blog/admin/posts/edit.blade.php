@extends('layouts.admin')

@section('content')

    @php /** @var \App\Models\BlogCategory $item */ @endphp

    <div id="content-wrapper">

        @if($item->exists)
            <form method="POST" action="{{route('blog.admin.posts.update', $item->id)}}">
                @method('PATCH')

                @else
                    <form method="POST" action="{{ route('blog.admin.posts.store') }}">
                        @method('PATCH')
                        @endif
                        @csrf

                        <div class="container">
                            <div class="row justify-content-center">
                                @php /** \Illuminate\Support\ViewErrorBag $errors*/@endphp
                                @if($errors->any())
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{$errors->first()}}
                                        </div>
                                        </div>
                                    </div>
                                @endif

                                @if(session('success'))
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="alert alert-success" role="alert" aria-label="Close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ session()->get('success') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    @include('blog.admin.posts.includes.post_edit_main_col')
                                </div>
                                <div class="col-md-4">
                                    @include('blog.admin.posts.includes.post_edit_add_col')
                                </div>
                            </div>
                        </div>
                    </form>

                    @if($item->exists)
                        <br>
                        <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
                            @method('DELETE')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button type="submit" class="btn btn-link">Удалить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif;
            </form>
    </div>
@endsection