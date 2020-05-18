@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        All Created Permits
                        <a href="{{ route('permits.create') }}" class="float-right btn btn-sm btn-outline-success">Create Permit</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Permit Number</th>
                                <th scope="col">valid from</th>
                                <th scope="col">Expires on</th>
                                <th scope="col">Goods Description</th>
                                <th scope="col">Origin</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permits as $permit)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $permit->permit_number }}</td>
                                    <td>{{ $permit->valid_from }}</td>
                                    <td>{{ $permit->expires_on }}</td>
                                    <td>{{ $permit->goods_description }}</td>
                                    <td>{{ $permit->origin }}</td>
                                    <td>{{ $permit->destination }}</td>
                                    <td>{{ $permit->created_at }}</td>
                                    <td>{{ $permit->updated_at }}</td>
                                    <td><a href="{{ route('permits.show', $permit) }}">View</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
