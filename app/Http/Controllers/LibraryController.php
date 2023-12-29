<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index_admin () {
        $bukus = Buku::all();
        $siswas = Siswa::all();
        $transaksis = Transaction::all();
        return view('index_admin', compact('bukus', 'siswas', 'transaksis'));
    }

    public function index_siswa () {
        $bukus = Buku::all();
        $siswa = Auth::guard('siswa')->user(); 
    
        return view('index_siswa', compact('bukus', 'siswa'));
    }

    public function login () {
        return view('login');
    }

    public function register () {
        return view('register');
    }

    public function profil () {
        return view('profil');
    }


    public function delete_buku($id) {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('dashboard_admin')->with('success', 'Deleted!');
    }

    public function create_buku(Request $request) {
        $datas = $request->validate([
            'judul'=>'required|string',
            'penerbit'=>'required|string',
            'pengarang'=>'required|string',
            'stok_buku'=>'required|string'
        ]);

        Buku::create($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Book Added!');
    }

    public function edit_buku(Request $request, $id) {
        $datas = $request->validate([
            'judul'=>'required|string',
            'penerbit'=>'required|string',
            'pengarang'=>'required|string',
            'stok_buku'=>'required|string'
        ]);

        $buku = Buku::find($id);
        $buku->update($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Book Edited!');
    }


    public function delete_siswa($id) {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('dashboard_admin')->with('success', 'Deleted!');
    }

    public function create_siswa(Request $request) {
        $datas = $request->validate([
            'name'=>'required|string',
            'kelas'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'role_status'=>'required|string'
        ]);

        Siswa::create($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Student Added!');
    }

    public function edit_siswa(Request $request, $id) {
        $datas = $request->validate([
            'name'=>'required|string',
            'kelas'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'role_status'=>'required|string'
        ]);

        $siswa = Siswa::find($id);
        $siswa->update($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Student Edited!');
    }

    public function borrow_book(Request $request, $siswaId, $namaSiswa, $kelasSiswa, $bukuId, $judulBuku, $siswaEmail)
    {

        $buku = Buku::find($bukuId);

        if ($buku && $buku->stok_buku > 0) {
            // Create a transaction
            Transaction::create([
                'siswa_id' => $siswaId,
                'nama_siswa' => $namaSiswa,
                'kelas_siswa' => $kelasSiswa,
                'buku_id' => $bukuId,
                'judul_buku' => $judulBuku,
                'siswa_email' => $siswaEmail,
            ]);

            // Update the book stock
            $buku->stok_buku -= 1;
            $buku->save();

            return redirect()->route('dashboard_siswa')->with('success', 'Book Borrowed!');
        } else {
            return redirect()->route('dashboard_siswa')->with('error', 'Book is not available for borrowing.');
        }
    }
    public function return_book($siswaId, $bukuId)
{
    $transaction = Transaction::where('siswa_id', $siswaId)
        ->where('buku_id', $bukuId)
        ->whereNull('returned_at')
        ->first();

    if ($transaction) {
        // Mark the transaction as returned
        $transaction->update(['returned_at' => now()]);

        // Increase the book stock
        $buku = Buku::find($bukuId);
        $buku->stok_buku += 1;
        $buku->save();

        // Delete the transaction record
        $transaction->delete();

        return redirect()->route('dashboard_siswa')->with('success', 'Book Returned!');
    } else {
        return redirect()->route('dashboard_siswa')->with('error', 'Book could not be returned.');
    }
}

}
