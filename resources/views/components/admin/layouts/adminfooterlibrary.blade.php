<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert', ({
        detail: {
            type,
            message
        }
    }) => {
        Toast.fire({
            icon: type,
            title: message
        })
    })
</script>



<script>
    const $button = document.querySelector('#sidebar-toggle');
    const $wrapper = document.querySelector('#wrapper');
    $button.addEventListener('click', (e) => {
        e.preventDefault();
        $wrapper.classList.toggle('toggled');
    });
</script>


<style type="text/css">
    .fa-spin {
        display: none;
    }

</style>
<script type="text/javascript">
    (function() {
        $('.form_prevent_multiple_submits').on('submit', function() {
            $('.button_prevent_multiple_submits').attr('disabled', 'true');
            $('.fa-spin').show();
        })
    })();
</script>
<script>
    $(document).ready(function() {
        $('#sidebar-toggle').click(function(e) {
            $.get("{{ URL('/admin/session') }}");
        });
    });
</script>
@section('footerSection')
@show
