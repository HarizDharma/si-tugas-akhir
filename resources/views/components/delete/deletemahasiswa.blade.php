@props(['datamahasiswa'])

<a href="{{ route('deleteMahasiswa', ['id' => $datamahasiswa['id']]) }}"
   class="font-medium text-blue-600 dark:text-blue-500"
   onclick="event.preventDefault(); deleteConfirmation('{{ $datamahasiswa['id'] }}');">
    <i class="fas fa-trash fa-lg inline-block mr-1 p-3 text-red-500 transform hover:scale-105"></i>
</a>

{{--                            form untuk metgod ketika di klik hapus data--}}
<form id="delete-form-{{ $datamahasiswa['id'] }}" action="{{ route('deleteMahasiswa', ['id' => $datamahasiswa['id']]) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

{{--sweet alert untuk konfirmasi delete atau tidak--}}
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
