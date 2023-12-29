@extends('layouts.main_index')
@section('main_index')
    {{-- content --}}
    <div class="container-fluid py-4">
          @include('partials.buku.create_buku')
        <div class="row">
          <div class="col-12">
            <div id="tablebuku">
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
                                    @php
                                        $transaction = $siswa->transactions()->where('buku_id', $buku->id)->whereNull('returned_at')->first();
                                        $isBookBorrowed = $transaction !== null;
                                    @endphp
                                
                                    @if ($isBookBorrowed)
                                        <form action="{{ route('return_book', ['siswaId' => $siswa->id, 'bukuId' => $buku->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn bg-gradient-warning w-30">Return</button>
                                        </form>
                                    @else
                                        @if ($buku->stok_buku > 0)
                                            <form action="{{ route('borrow_book', ['siswaId' => $siswa->id, 'namaSiswa' => $siswa->name, 'kelasSiswa' => $siswa->kelas, 'bukuId' => $buku->id, 'judulBuku' => $buku->judul, 'siswaEmail' => $siswa->email]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn bg-gradient-primary w-30">Borrow</button>
                                            </form>
                                        @else
                                            <button type="button" class="btn bg-gradient-secondary w-30" disabled>Borrow</button>
                                        @endif
                                    @endif
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