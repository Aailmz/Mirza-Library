@extends('layouts.main_index_admin')
@section('main_index')
    {{-- content --}}
    <div class="container-fluid py-4">
          @include('partials.buku.create_buku')
          @include('partials.siswa.create_siswa')
        <div class="row">
          <div class="col-12">
            <div id="tablebuku">
            <button type="button" class="btn bg-gradient-success w-100" data-bs-toggle="modal" data-bs-target="#createBuku">
                + Add Book
              </button>
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Books Table</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Title</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerbit</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penulis</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Buku</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($bukus as $buku)
                            <tr>
                                <td>
                                <p class="text-xs text-secondary mb-0">{{ $buku->judul }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-secondary mb-0">{{ $buku->penerbit }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-secondary mb-0">{{ $buku->pengarang }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-secondary mb-0">{{ $buku->stok_buku }}</p>
                                </td>
                                <td>
                                    <button type="button" class="btn bg-gradient-info w-30" data-bs-toggle="modal" data-bs-target="#editBuku_{{ $buku->id }}">
                                        Edit
                                      </button>
                                      @include('partials.buku.edit_buku')
                                    <form action="{{ route("buku.delete", $buku->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn bg-gradient-danger w-30 mt-0 mb-0">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
            <div id="tablesiswa" style="display: none">
                <button type="button" class="btn bg-gradient-success w-100" data-bs-toggle="modal" data-bs-target="#createSiswa">
                    + Add Student
                  </button>
                <div class="card mb-4">
                  <div class="card-header pb-0">
                    <h6>Students Data</h6>
                  </div>
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Class</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $siswa)
                                <tr>
                                    <td>
                                    <p class="text-xs text-secondary mb-0">{{ $siswa->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $siswa->kelas }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $siswa->email }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $siswa->role_status }}</p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn bg-gradient-info w-30" data-bs-toggle="modal" data-bs-target="#editSiswa_{{ $siswa->id }}">
                                            Edit
                                          </button>
                                          @include('partials.siswa.edit_siswa')
                                        <form action="{{ route("siswa.delete", $siswa->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-gradient-danger w-30 mt-0 mb-0">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
                <div id="tablePinjam" style="display: none">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                      <h6>Borrowed Books</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book ID</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Title</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Name</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Class</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Email</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($transaksis as $transaksi)
                                  <tr>
                                      <td>
                                      <p class="text-xs text-secondary mb-0">{{ $transaksi->buku_id }}</p>
                                      </td>
                                      <td>
                                          <p class="text-xs text-secondary mb-0">{{ $transaksi->judul_buku }}</p>
                                      </td>
                                      <td>
                                          <p class="text-xs text-secondary mb-0">{{ $transaksi->nama_siswa }}</p>
                                      </td>
                                      <td>
                                        <p class="text-xs text-secondary mb-0">{{ $transaksi->kelas_siswa }}</p>
                                      </td>
                                      <td>
                                        <p class="text-xs text-secondary mb-0">{{ $transaksi->siswa_email }}</p>
                                    </td>
                                  </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  </div>
          </div>
        </div>
        <footer class="footer pt-3  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                Made by Mirza, HAHAHA Lop yu <i class="fa fa-heart"></i>
              </div>
            </div>
          </div>
        </footer>
      </div>
@endsection