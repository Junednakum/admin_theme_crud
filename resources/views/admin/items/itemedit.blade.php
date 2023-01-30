@extends('layouts.app')

@push('childStyles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/custome/custome.css')}}">
@endpush

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
                    
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-11 col-md-12 col-sm-12 col-12">
                            <h4>Add Item</h4>
                        </div>  
                        <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                            <a href="{{ route('items') }}"><button class="btn btn-outline-primary mb-2">back</button></a>
                        </div>                
                    </div>
                </div>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="row">
                        <div class="col-12">
                            <form id="add_item_form" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput">Name</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" id="name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput2">Item no</label>
                                            <input type="number" class="form-control" id="formGroupExampleInput2" name="item_no" id="item_no" placeholder="Enter Item No.">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput2">Machine Type</label>
                                            <select class="form-control disabled-results" name="machine_type" id="machine_type">
                                                @foreach ($machinetypeList  as $machineList )
                                                <option value="{{ $machineList->id }}">{{ $machineList->name }}</option>
                                            @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput2">Department
                                            </label>
                                            <select class="form-control disabled-results" name="department_id" id="department_id">
                                            @foreach ($departmentList  as $department )
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                </div>
                           
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput2">Site</label>
                                            <select class="form-control disabled-results" name="site_id" id="site_id">
                                                @foreach ($siteList  as $site )
                                                <option value="{{ $site->id }}">{{ $site->name }}</option>
                                            @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput2">Setup time in minutes</label>
                                            <input type="number" class="form-control" id="formGroupExampleInput2" name="setup_time" id="setup_time" value="5">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group mb-4">
                                            <label for="formGroupExampleInput2">Output per hour</label>
                                            <input type="number" class="form-control" id="formGroupExampleInput2" name="output_pe_hour" id="output_pe_hour" value="2000">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 text-right">
                                    </br></br>
                                        <div class="form-group mb-4">
                                            <input type="submit" class="btn btn-primary" id="output_pe_hour" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>                                        
                    </div>

                </div>
            </div>
        
    </div>

</div>
    
@endsection  

@push('childScripts')
<script type="text/javascript">
    var schedule_routes = {
        add_item: "{{ route('store') }}",
    }
    let csrf = '{{ csrf_token() }}';
</script>    
 <script>       
    $(".disabled-results").select2();
</script>
<script src="{{asset('assets/js/custome/item.js')}}"></script>
@endpush