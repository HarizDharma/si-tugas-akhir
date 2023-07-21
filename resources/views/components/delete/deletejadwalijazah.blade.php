@props(['datamahasiswa'])

<a href="{{ route('deletejadwalijazah', ['id' => $datamahasiswa['id']]) }}"
   class="flex items-center justify-center w-full px-4 py-2 text-white bg-red-500 rounded-lg dark:bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 focus:outline-none dark:focus:ring-red-800"
   onclick="event.preventDefault(); deleteConfirmation('{{ $datamahasiswa['id'] }}');">
    <i class="fas fa-trash fa-lg mr-2 transform hover:scale-105"></i>
    <span class="text-sm font-medium">Hapus Jadwal</span>
</a>


{{--form untuk metgod ketika di klik hapus data--}}
<form id="delete-form-{{ $datamahasiswa['id'] }}" action="{{ route('deletejadwalijazah', ['id' => $datamahasiswa['id']]) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

{{--sweet alert untuk konfirmasi delete atau tidak--}}
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Jadwal akan dihapus!",
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
