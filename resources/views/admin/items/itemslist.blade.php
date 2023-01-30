@extends('layouts.app')
@section('title', 'Items')
@push('headerRight')
    <div class="text-right">
        <a class="btn btn-default" href="">
            summary
        </a>
    </div>
@endpush

@section('content')

            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-11 col-md-12 col-sm-12 col-12">
                                        <h2>Item List</h2>
                                    </div> 
                                    <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                        <a href="{{ route('itemsadd') }}"><button class="btn btn-outline-primary mb-2">Add</button></a>
                                    </div>                 
                                </div>
                            </div></br>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="itemsTable" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Item no</th>
                                            <th>Item</th>
                                            <th>Machine type</th>
                                            <th>Production department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($itemsList as $itemList)
                                        <tr id="item_{{ $itemList->id }}">
                                            <td>{{ $itemList->item_no }}</td>
                                            <td>{{ $itemList->name }}</td>
                                            <td>{{ $itemList->machineType->name }}</td>
                                            <td>{{ $itemList->departmentType->name}}</td>
                                            {{-- <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-dark btn-sm">Open</button>
                                                    <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                      <a class="dropdown-item" href="#">Action</a>
                                                      <a class="dropdown-item" href="#">Another action</a>
                                                      <a class="dropdown-item" href="#">Something else here</a>
                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                  </div>
                                            </td> --}}
                                            <td class="text-center">
                                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" aria-describedby="tooltip322630">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg></a>

                                                <a href="{{ route('viewitem', ['id' => $itemList->id]) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" aria-describedby="tooltip322630">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>

                                                <a href="{{ route('viewitem', ['id' => $itemList->id]) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" aria-describedby="tooltip322630" id="deleteitem" data-id="{{ $itemList->id }}" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
           
@endsection

@push('childScripts')

<script type="text/javascript">
    var schedule_routes = {
        deleteitem: "{{ route('deleteitem') }}",
    }
    let csrf = '{{ csrf_token() }}';
</script>           

<script>
$('#itemsTable').DataTable( {
    "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    buttons: {
        buttons: [
            { extend: 'copy', className: 'btn btn-sm' },
            { extend: 'csv', className: 'btn btn-sm' },
            { extend: 'excel', className: 'btn btn-sm' },
            { extend: 'print', className: 'btn btn-sm' }
        ]
    },
    "oLanguage": {
        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
       "sLengthMenu": "Results :  _MENU_",
    },
    "stripeClasses": [],
    "lengthMenu": [7, 10, 20, 50],
    "pageLength": 7 
} );
</script>
<script src="{{asset('assets/js/custome/item.js')}}"></script>
@endpush