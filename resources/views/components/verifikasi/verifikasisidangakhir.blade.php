@props(['datamahasiswa'])

<button type="button" class="text-white w-full bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800" onclick="event.preventDefault(); deleteConfirmation('{{ $datamahasiswa['id'] }}');">
    <i class="fas fa-check fa-lg inline-block p-1 transform hover:scale-105"></i>Verifikasi
</button>

{{--                            form untuk metgod ketika di klik verifikasi akademik data--}}
<form id="delete-form-{{ $datamahasiswa['id'] }}" action="{{ route('verifikasisidangakhir', ['id' => $datamahasiswa['id']]) }}" method="POST" style="display: none;">
    @csrf
    @method('POST')
</form>

{{--sweet alert untuk konfirmasi verifikasi atau tidak--}}
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Mahasiswa akan diverifikasi !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
