<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{ asset('backend/js/jquery-3.5.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('backend/js/feather.min.js') }}"></script>
<script src="{{ asset('backend/js/summernote.min.js') }}"></script>
<script src="{{ asset('backend/js/all.min.js') }}"></script>

<!--[if lt IE 9]-->
<script src="{{ asset('backend/js/html5shiv.min.js') }}"></script>
<script src="{{ asset('backend/js/respond.min.js') }}"></script>
<!--[endif]-->

<!-- Slimscroll JS -->
<script src="{{ asset('backend/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{ asset('backend/js/script.js') }}"></script>
@yield('js')
</body>

</html>
