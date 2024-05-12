<script src="{{asset('/assets/js/plugins/fullcalendar.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/flatpickr.min.js')}}"></script>

<!-- main script file  -->
<script src="{{asset('/assets/js/soft-ui-dashboard-pro-tailwind.js?v=1.0.1')}}"></script>
<script src="{{asset('/assets/js/plugins/choices.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/datatables.min.js')}}"></script>
<<<<<<< HEAD
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@livewireScripts


<script>
    function confirmDeletion(memberId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById('delete-form-' + memberId).submit();
            }
        });
    }
</script>
