@extends('layouts.admin')

    @section('content')

        @php /** @var \App\Models\BlogCategory $item */ @endphp

        <div id="content-wrapper">

        @if($item->exists)
        <form method="POST" action="{{route('blog.admin.categories.update', $item->id)}}">
            @method('PATCH')

        @else
            <form method="POST" action="{{ route('blog.admin.categories.store') }}">
         @endif
            @csrf

            <div class="container">
                @php /** \Illuminate\Support\ViewErrorBag $errors*/@endphp
                @if($errors->any())
                    <div class="row justify-content-center">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                            @foreach($errors->all() as $errorlist)
                            <li>{{ $errorlist }}</li>
                            @endforeach
                            </ul>
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

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('blog.admin.categories.includes.item_edit_main_col')
                    </div>
                    <div class="col-md-4">
                        @include('blog.admin.categories.includes.item_edit_add_col')
                    </div>
                </div>
            </div>
            </form>
        </form>
        </div>
    @endsection