@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Create a new permit
                        <a href="{{ route('permits.index') }}" class="float-right btn btn-sm btn-outline-success">Back to Permits</a>
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('permits.store') }}" method="POST">
                            @csrf
                            <h3>Vehicle Details</h3>
                            <div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="reg_no">Vehicle Registration Number</label>
                                        <input type="text" name="reg_no" id="reg_no" class="form-control" placeholder="Vehicle Registration Number">
                                    </div>
                                    <div class="form-group col">
                                        <label for="make">Vehicle Make</label>
                                        <input type="text" name="make" id="make" class="form-control" placeholder="Vehicle Make">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="model">Vehicle Model</label>
                                        <input type="text" name="model" id="model" class="form-control" placeholder="Vehicle Model">
                                    </div>
                                    <div class="form-group col">
                                        <label for="color">Vehicle Color</label>
                                        <input type="text" name="color" id="color" class="form-control" placeholder="Vehicle Color">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h3>Permit Details</h3>
                            <div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="permit_number">Permit Number</label>
                                        <input type="text" name="permit_number" id="permit_number" class="form-control" placeholder="Permit Number">
                                    </div>
                                    <div class="form-group col">
                                        <label for="valid_from"> Valid From</label>
                                        <input type="date" name="valid_from" id="valid_from" class="form-control" placeholder="Valid From">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="expires_on">Expires On</label>
                                        <input type="date" name="expires_on" id="expires_on" class="form-control" placeholder="Expires On">
                                    </div>
                                    <div class="form-group col">
                                        <label for="goods_description"> Description of goods</label>
                                        <input type="text" name="goods_description" id="goods_description" class="form-control" placeholder="Description of goods">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="origin">Origin (Where From)</label>
                                        <input type="text" name="origin" id="origin" class="form-control" placeholder="Origin (Where From)">
                                    </div>
                                    <div class="form-group col">
                                        <label for="destination"> Destination (Where To)</label>
                                        <input type="text" name="destination" id="destination" class="form-control" placeholder="Destination (Where To)">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
