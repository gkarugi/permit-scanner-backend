@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <example-component></example-component>
            <div class="row">
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Permits
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Total permits created</h5>
                            <p class="font-weight-bolder" style="font-size:x-large;">{{ \App\Permit::count() }}</p>
                            <a href="{{ route('permits.create') }}" class="btn btn-primary">Create New Permit</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Scanned Permits
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Total permits scanned</h5>
                            <p class="font-weight-bolder" style="font-size:x-large;">100</p>
                            <a href="#" class="btn btn-primary">View Scanned Permits</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Expired Permits
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Total permits expired</h5>
                            <p class="font-weight-bolder" style="font-size:x-large;">200</p>
                            <a href="#" class="btn btn-primary">View Expired Permits</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Violations
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Permit Violations</h5>
                            <p class="font-weight-bolder text-danger" style="font-size:x-large;">400</p>
                            <a href="#" class="btn btn-primary">View Violations</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Users
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Total Scanning users</h5>
                            <p class="font-weight-bolder" style="font-size:x-large;">{{ \App\User::count() }}</p>
                            <a href="{{ route('users.index') }}" class="btn btn-primary">View Scanning Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
