<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- plugins:js -->
<script src="{{ asset('/assets/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ asset('/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('/assets/js/template.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('/assets/js/data-table.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.js') }}"></script>
<!-- End custom js for this page-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    let table = new DataTable('#myDataTable');
</script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();
        var utlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(utlToRedirect);
        swal({
                title: "Are you sure you want to delete this Item ?",
                text: "You  won't be able to revert this delete ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = utlToRedirect;
                }
            });
    }
</script>

@yield('script')
