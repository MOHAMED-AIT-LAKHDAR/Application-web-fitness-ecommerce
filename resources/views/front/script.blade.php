<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5bootstrap.min.js"></script>


<script src="{{ asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>
@if (Session::has('messsage'))
    <script>
        swal("Message", "{{ Session::get('message') }}", 'success', {
            button: true,
            button: "Ok",
            timer: 3000,
        })
    </script>
@endif
@yield('script')
