@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
                    
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-11 col-md-12 col-sm-12 col-12">
                            <h2>{{  strtoupper($itemsDetails->name) }}</h2>
                        </div>    
                        <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                            <a href="{{ route('items') }}"><button class="btn btn-outline-primary mb-2">back</button></a>
                        </div>              
                    </div>
                </div></br>
    
                <div>
                    <table class="table">
                       <tbody>
                          <tr>
                             <td width="20%"><b>Name:</b></td>
                             <td>{{  strtoupper($itemsDetails->name) }} </td>
                          </tr>
                          <tr>
                             <td><b>Number:</b></td>
                             <td>{{ $itemsDetails->item_no }}</td>
                          </tr>
                          <tr>
                             <td class="collapsing"><b>Machine type:</b></td>
                             <td>{{  $itemsDetails->machineType->name }}</td>
                          </tr>
                          <tr>
                             <td class="collapsing"><b>Production department:</b></td>
                             <td>{{  $itemsDetails->departmentType->name }}</td>
                          </tr>
                          <tr>
                             <td><b>Site:</b></td>
                             <td>{{  $itemsDetails->siteType->name }}</td>
                          </tr>
                          <tr>
                             <td><b>Setup time:</b></td>
                             <td>{{  $itemsDetails->setup_time }}</td>
                          </tr>
                          <tr>
                             <td><b>Output per hour:</b></td>
                             <td>{{  $itemsDetails->output_per_hours }}</td>
                          </tr>
                       </tbody>
                    </table>
                 </div>
            
            </div>
        </div>
        
    </div>

</div>
    
@endsection  