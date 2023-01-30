<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="plugins/table/datatable/datatables.js"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
<script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>

<script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>

<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('plugins/select2/custom-select2.js')}}"></script>

<script src="{{asset('assets/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
  //First upload
  var firstUpload = new FileUploadWithPreview('myFirstImage')
  //Second upload
  var secondUpload = new FileUploadWithPreview('mySecondImage')
  
</script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->