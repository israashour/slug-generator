@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Slug Generation History</h1>
    <div class="col-sm-12 text-right mb-5">
        <a href="{{ route('generate-slug') }}" class="btn btn-primary mr-5">Generate Slug</a>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Input String</th>
                <th>Generated Slug</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slugHistory as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->input_string }}</td>
                    <td>{{ $entry->generated_slug }}</td>
                    <td>{{ $entry->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
