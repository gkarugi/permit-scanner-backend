@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        View permit - {{ $permit->permit_number }}
                        <a href="{{ route('permits.index') }}" class="float-right btn btn-sm btn-outline-success">Back to Permits</a>
                    </div>
                    <div class="card-body pt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Permit data</h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Permit Number</td>
                                            <td>{{ $permit->permit_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Valid From</td>
                                            <td>{{ $permit->valid_from }}</td>
                                        </tr>
                                        <tr>
                                            <td>Expires On</td>
                                            <td>{{ $permit->expires_on }}</td>
                                        </tr>
                                        <tr>
                                            <td>Goods Description</td>
                                            <td>{{ $permit->goods_description }}</td>
                                        </tr>
                                        <tr>
                                            <td>Origin</td>
                                            <td>{{ $permit->origin }}</td>
                                        </tr>
                                        <tr>
                                            <td>Destination</td>
                                            <td>{{ $permit->destination }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br> <br>
                                <h3>Vehicle Data</h3>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Vehicle Reg No</td>
                                        <td>{{ $permit->vehicle->reg_no }}</td>
                                    </tr>
                                    <tr>
                                        <td>Make</td>
                                        <td>{{ $permit->vehicle->make }}</td>
                                    </tr>
                                    <tr>
                                        <td>Model</td>
                                        <td>{{ $permit->vehicle->model }}</td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td>{{ $permit->vehicle->color }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <div>
                                    {!! QrCode::size(500)->generate($permit->permit_number); !!}
                                </div>
                                <button type="button" class="btn btn-success text-center" data-toggle="modal" data-target="#new-occupant-modal">New Occupant</button>
                                <br> <br>
                                <h3>Vehicle Occupants</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Reg. Document</td>
                                            <td>Reg. Number</td>
                                            <td>Phone</td>
                                            <td>Email</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permit->vehicle->occupants as $occupant)
                                            <tr>
                                                <td>{{ $occupant->name }}</td>
                                                <td>{{ $occupant->reg_document }}</td>
                                                <td>{{ $occupant->reg_document_number }}</td>
                                                <td>{{ $occupant->phone }}</td>
                                                <td>{{ $occupant->email }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="new-occupant-modal" tabindex="-1" role="dialog" aria-labelledby="new-occupant-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('occupants.store', $permit) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Occupant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Full name" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="document_type">Reg document type</label>
                            <select name="document_type" id="document_type" class="form-control" required>
                                <option value="id_number">ID Number</option>
                                <option value="passport_number">Passport Number</option>
                            </select>
                            @error('passport_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="reg_number">ID number</label>
                            <input type="text" name="reg_number" id="reg_number" value="{{ old('reg_number') }}" class="form-control" placeholder="ID Number" required>
                            @error('reg_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" cvalue="{{ old('phone') }}" class="form-control" placeholder="Phone" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
