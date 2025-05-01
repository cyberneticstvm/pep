<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('form').submit(function() {
            $(this).find(".btn-submit").attr("disabled", true);
            $(this).find(".btn-submit").html("Loading...<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
        });
    });
</script>
<script>
    const toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });
</script>
@if(session()->has('success'))
<script>
    toast.fire({
        icon: 'success',
        title: "{{ session()->get('success') }}",
        color: 'green'
    })
</script>
@endif
@if(session()->has('error'))
<script>
    toast.fire({
        icon: 'error',
        title: "{{ session()->get('error') }}",
        color: 'red'
    })
</script>
@endif
@if(session()->has('warning'))
<script>
    toast.fire({
        icon: 'warning',
        title: "{{ session()->get('warning') }}",
        color: 'orange'
    })
</script>
@endif
<script>
    function success(res) {
        toast.fire({
            icon: 'success',
            title: res.success,
            color: 'green'
        });
    }

    function failed(res) {
        toast.fire({
            icon: 'error',
            title: res.error,
            color: 'red'
        });
    }

    function error(err) {
        var msg = JSON.parse(err.responseText);
        toast.fire({
            icon: 'error',
            title: msg.message,
            color: 'red'
        });
    }

    $(document).on('click', '.dlt', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure want to delete this record?',
            /*text: "You won't be able to revert this!",*/
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
            }
        })
    });

    $(document).on('click', '.proceed', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure want to proceed?',
            /*text: "You won't be able to revert this!",*/
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
            }
        })
    });
</script>
<script>
    function validatePropertyForm() {
        let frm = document.forms["frmProperty"];
        if (!frm['name'].value) {
            failed({
                'error': 'Property Name / Title is required'
            })
            return false;
        }
        if (!frm['description'].value) {
            failed({
                'error': 'Property description is required'
            })
            return false;
        }
        if (!frm['property_type'].value) {
            failed({
                'error': 'Property type is required'
            })
            return false;
        }
        if (!frm['property_condition'].value) {
            failed({
                'error': 'Property condition is required'
            })
            return false;
        }
        if (!frm['property_for'].value) {
            failed({
                'error': 'Property for is required'
            })
            return false;
        }
        if (!frm['built_year'].value) {
            failed({
                'error': 'Property built year is required'
            })
            return false;
        }
        if (!frm['formatted_address'].value) {
            failed({
                'error': 'Property location is required'
            })
            return false;
        }
        if (frm['country_code'].value != "{{ country()->code }}") {
            failed({
                'error': 'Invalid location has been selected. You may choose a location in' + "{{ country()->code ?? 'us' }}"
            })
            return false;
        }
        return true;
    }
</script>
<input type="hidden" name="ccode" id="ccode" value="{{ country()->code ?? 'us' }}" />