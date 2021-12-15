@if (session('alert'))
<script>
    let alertInfo = @json(session('alert'));
    Swal.fire({
        icon: alertInfo.icon,
        title: alertInfo.title,
        text: alertInfo.text,
        })
</script>
@endif