<script src="{{asset('assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/fastclick.js')}}"></script>
<script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/plugins/switchery/switchery.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/pikeadmin.js')}}"></script>

<!-- BEGIN Java Script for this page -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- BEGIN JavaScript for select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/daterangepicker.js')}}"></script>

<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#d-table').DataTable({
            "order": []
        });
    });

//    $(document).ready(function() {
//        $('.select2').select2();
//    });
</script>
<script>
    function confirmDelete(){
        var res=confirm('Do you really want to delete?');
        if(res){
            return true;
        }else{
            return false;
        }
    }
</script>