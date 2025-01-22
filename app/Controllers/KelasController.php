<?php

namespace App\Controllers;

use App\Models\KelasModel;

class KelasController extends BaseController
{
    protected $kelasModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->kelasModel = new KelasModel();
    }

    // Menampilkan semua data kelas
    public function index()
    {
        $data['kelas'] = $this->kelasModel->findAll();
        return view('kelas/index', $data); // Pastikan Anda membuat view `kelas/index`
    }

    // Menampilkan form untuk menambah data kelas
    public function create()
    {
        return view('kelas/create'); // Pastikan Anda membuat view `kelas/create`
    }

    // Menyimpan data kelas baru
    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'nama_kelas' => 'required|max_length[100]',
            // 'deskripsi_kelas' => 'max_length[255]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            // 'deskripsi_kelas' => $this->request->getPost('deskripsi_kelas'),
        ];

        // Simpan data ke dalam database
        if ($this->kelasModel->insert($data)) {
            return redirect()->to('/kelas')->with('success', 'Data kelas berhasil ditambahkan.');
        } else {
            return redirect()->to('/kelas/create')->with('error', 'Gagal menambahkan data kelas.');
        }
    }


    // Menampilkan form untuk mengedit data kelas
    public function edit($id)
    {
        $data['kelas'] = $this->kelasModel->find($id);
        if (!$data['kelas']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kelas tidak ditemukan.');
        }

        return view('kelas/edit', $data); // Pastikan Anda membuat view `kelas/edit`
    }

    // Memperbarui data kelas
    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama_kelas' => 'required|max_length[100]',
            // 'deskripsi_kelas' => 'max_length[255]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $this->kelasModel->update($id, [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            // 'deskripsi_kelas' => $this->request->getPost('deskripsi_kelas')
        ]);

        return redirect()->to('/kelas')->with('success', 'Data kelas berhasil diperbarui.');
    }

    // Menghapus data kelas
    public function delete($id)
    {
        $this->kelasModel->delete($id);
        return redirect()->to('/kelas')->with('success', 'Data kelas berhasil dihapus.');
    }
}
