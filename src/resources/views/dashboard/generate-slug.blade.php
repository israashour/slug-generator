@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Generate Slug') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('generate-slug') }}">
                        @csrf

                        <div class="form-group">
                            <label for="inputString">Input String</label>
                            <input type="text" name="inputString" id="inputString" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Generate Slug</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
