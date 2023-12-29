<div class="modal fade" id="editBuku_{{ $buku->id }}" tabindex="-1" role="dialog" aria-labelledby="createBukuLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createBukuLabel">Add Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('buku.edit', ['id' => $buku->id]) }}" method="POST"> 
            @csrf
            @method('PUT')
            <input type="hidden" id="editBookId" value="{{ $buku->id }}"> 
            <div class="modal-body container-fluid"> 
                <div class="mb-3"> 
                    <label for="judul" class="form-label">Judul Buku</label> 
                    <input autocomplete="off" type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}"> 
                    @error('judul') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
         
                    <label for="penerbit" class="form-label">Penerbit</label> 
                    <input autocomplete="off" type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}"> 
                    @error('penerbit') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
         
                    <label for="pengarang" class="form-label">Pengarang</label> 
                    <input autocomplete="off" type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}"> 
                    @error('pengarang') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
         
                    <label for="stok_buku" class="form-label">Stok Buku</label> 
                    <input autocomplete="off" type="number" class="form-control @error('stok_buku') is-invalid @enderror" id="stok_buku" name="stok_buku" value="{{ old('stok_buku', $buku->stok_buku) }}"> 
                    @error('stok_buku') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
                </div> 
            </div> 
            <div class="modal-footer"> 
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-success">Save changes</button> 
            </div> 
        </form>
      </div>
    </div>
  </div>
</div>
