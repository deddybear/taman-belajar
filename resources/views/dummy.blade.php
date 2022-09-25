@section('content')
<div class="conter-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable ui-sortable-handle">
                    <div class="card mt-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Gallery Foto</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pesan_sistem my-2">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success text-sm text-center">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger text-sm">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                @if ($errors->any())
                                <div class="alert alert-danger text-sm text-center">
                                    <ul style="padding: 0 !important">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
@endsection