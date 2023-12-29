<div class="modal fade" id="createSiswa" tabindex="-1" role="dialog" aria-labelledby="createSiswaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSiswaLabel">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('siswa.create') }}" method="POST"> 
            @csrf 
            <div class="modal-body container-fluid"> 
                <div class="mb-3"> 
                    <label for="name" class="form-label">Student Name</label> 
                    <input autocomplete="off" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"> 
                    @error('name') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
                    
                    <label for="kelas" class="form-label">Student Class</label> 
                    <input autocomplete="off" type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas') }}"> 
                    @error('kelas') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
         
                    <label for="email" class="form-label">Student Email</label> 
                    <input autocomplete="off" type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"> 
                    @error('email') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 
         
                    <label for="password" class="form-label">Password</label> 
                    <input autocomplete="off" type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}"> 
                    @error('password') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror 

                    <label for="role_status" class="form-label">Status</label> 
                    <input autocomplete="off" type="" class="form-control @error('role_status') is-invalid @enderror" id="role_status" name="role_status" placeholder="Student" value="siswa" readonly> 

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