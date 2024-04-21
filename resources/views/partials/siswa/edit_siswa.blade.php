<div class="modal fade" id="editSiswa_{{ $siswa->id }}" tabindex="-1" role="dialog" aria-labelledby="createSiswaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSiswaLabel">Add Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('siswa.edit', ['id' => $siswa->id]) }}" method="POST"> 
            @csrf
            @method('PUT')
            <input type="hidden" id="editSiswaId" value="{{ $siswa->id }}"> 
            <div class="modal-body container-fluid"> 
                <div class="mb-3"> 
                    <label for="name" class="form-label">Student Name</label> 
                    <input autocomplete="off" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $siswa->name) }}"> 
                    @error('name') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
         
                    <label for="kelas" class="form-label">Student Class</label> 
                    <input autocomplete="off" type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas', $siswa->kelas) }}"> 
                    @error('kelas') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
         
                    <label for="email" class="form-label">Student Email</label> 
                    <input autocomplete="off" type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $siswa->email) }}"> 
                    @error('email') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
         
                    <label for="password" class="form-label">Password</label> 
                    <input autocomplete="off" type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password', $siswa->password) }}"> 
                    @error('password') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 

                    <label for="role_status" class="form-label">Status: Student</label> 
            

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
