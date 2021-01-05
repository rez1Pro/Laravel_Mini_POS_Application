</div>
<script src="{{ mix('js/app.js') }}"></script>
<!----- Sweet Alert ---->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // Datatable
    $(document).ready(function() {
        $('#myDataTable').DataTable();
    });
    $(document).ready(function() {
        $('#dataTable-purchase').DataTable();
    });
    $(document).ready(function() {
        $('#dataTable-payment').DataTable();
    });
    $(document).ready(function() {
        $('#dataTable-receipt').DataTable();
    });
    $(document).ready(function() {
        $('#dataTable-sale').DataTable();
    });
    // Flush messsage
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $('#' + id).submit();
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your Data is safe Now!");
                };
            });
    });

</script>

</body>

</html>
