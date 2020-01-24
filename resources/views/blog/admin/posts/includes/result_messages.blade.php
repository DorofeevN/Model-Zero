@if($errors->any())
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <button type="button" class="close"
                    data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
                <ul>
                    @foreach ($errors->all() as $error)<li>{{$error}}</li>@endforeach
                </ul>
            </button>
        </div>
    </div>
</div>
@endif

@if(session('success'))
    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="alert alert-success" role="alert">
            <button type="button" class="close"
                    data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
                {{ session()->get('success') }}
            </button>
        </div>
    </div>
    </div>
@endif