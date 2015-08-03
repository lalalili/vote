@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <form role="form" action="{{url('/admin/album/batch')}}" method="POST" enctype="multipart/form-data"
                      accept-charset="UTF-8">
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Chose File</label>
                            <input type="file" name="upload">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label></label>

                        <div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-default" type="submit">Upload</button>
                            <button class="btn btn-default" type="reset">Reset</button>
                        </div>
                        <div><h1></h1></div>
                    </div>
                </form>
                @include('flash::message')
            </div>
        </div>
    </div>
@endsection
