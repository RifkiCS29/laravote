<form onsubmit="return confirm('Yakin Hapus Data User Ini ?')" action="{{ $url_destroy }}" method="post">
    <a class="btn btn-sm btn-outline-warning py-0" style="font-size: 0.9em;" href="{{ $url_edit }}">Edit</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.9em;">Delete</button>
</form> 