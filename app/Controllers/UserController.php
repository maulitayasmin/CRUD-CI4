<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel(); // Inisialisasi model
    }

    // Tampilkan semua data
    // public function index()
    // {
    //     $data['users'] = $this->userModel->findAll(); // Ambil semua data
    //     return view('user/index', $data); // Tampilkan ke view
    // }

    public function index()
    {
        $db = \Config\Database::connect();

        // Ambil data kelas untuk dropdown filter
        $kelasBuilder = $db->table('kelas');
        $kelas = $kelasBuilder->get()->getResultArray();

        // Ambil parameter filter kelas dari query string
        $selectedKelas = $this->request->getGet('kelas');

        // Query data mahasiswa dengan join ke tabel kelas
        $builder = $db->table('users');
        $builder->select('users.id_mahasiswa, users.nama_mahasiswa, users.foto_mahasiswa, users.foto_ktm, users.jenis_kelamin, kelas.nama_kelas');
        $builder->join('kelas', 'kelas.id_kelas = users.id_kelas', 'left');

        // Jika ada filter kelas, tambahkan kondisi where
        if (!empty($selectedKelas)) {
            $builder->where('users.id_kelas', $selectedKelas);
        }

        $users = $builder->get()->getResultArray();

        // Kirim data ke view
        return view('user/index', [
            'users' => $users,
            'kelas' => $kelas,
            'selectedKelas' => $selectedKelas,
        ]);
    }



    // Tampilkan form tambah data
    public function create()
    {
        $kelasModel = new KelasModel();
        $data['kelas'] = $kelasModel->findAll();
        return view('user/create', $data);
    }


    // Proses tambah data
    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'nama_mahasiswa' => 'required|max_length[100]',
            'foto_mahasiswa' => 'uploaded[foto_mahasiswa]',
            'foto_ktm' => 'uploaded[foto_ktm]',
            'jenis_kelamin' => 'required',
            'id_kelas' => 'required|integer'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $file1 = $this->request->getFile('foto_mahasiswa');
        $newName1 = $file1->getRandomName();
        $file1->move('uploads', $newName1);
        $data['foto_mahasiswa'] = 'uploads/' . $newName1;

        $file2 = $this->request->getFile('foto_ktm');
        $newName2 = $file2->getRandomName();
        $file2->move('uploads', $newName2);
        $data['foto_ktm'] = 'uploads/' . $newName2;

        // Simpan data
        $userModel = new UserModel();
        $userModel->insert([
            'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
            'foto_mahasiswa' => $data['foto_mahasiswa'],
            'foto_ktm' => $data['foto_ktm'],
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_kelas' => $this->request->getPost('id_kelas')  // Simpan id_kelas yang dipilih
        ]);

        return redirect()->to('/users')->with('success', 'Data user berhasil ditambahkan.');
    }




    // Tampilkan form edit
    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        // Ambil data semua kelas
        $kelasModel = new KelasModel(); // Pastikan model ini sudah dibuat
        $data['classes'] = $kelasModel->findAll(); // Ambil semua data kelas


        return view('user/edit', $data);
    }

    // Proses update data
    public function update($id)
    {
        $data = [
            'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_kelas' => $this->request->getPost('id_kelas'),
        ];

        // Tangani pengunggahan file baru untuk 'foto_mahasiswa'
        $file1 = $this->request->getFile('foto_mahasiswa');
        if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
            // Hapus foto lama jika ada
            $oldPhoto1 = $this->userModel->find($id)['foto_mahasiswa'];
            if ($oldPhoto1 && file_exists(ROOTPATH . 'public/' . $oldPhoto1)) {
                unlink(ROOTPATH . 'public/' . $oldPhoto1);
            }

            // Pindahkan file baru ke folder 'uploads'
            $newName1 = $file1->getRandomName();
            $file1->move('uploads', $newName1);
            $data['foto_mahasiswa'] = 'uploads/' . $newName1;
        }

        // Tangani pengunggahan file baru untuk 'foto_ktm'
        $file2 = $this->request->getFile('foto_ktm');
        if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            // Hapus foto lama jika ada
            $oldPhoto2 = $this->userModel->find($id)['foto_ktm'];
            if ($oldPhoto2 && file_exists(ROOTPATH . 'public/' . $oldPhoto2)) {
                unlink(ROOTPATH . 'public/' . $oldPhoto2);
            }

            // Pindahkan file baru ke folder 'uploads'
            $newName2 = $file2->getRandomName();
            $file2->move('uploads', $newName2);
            $data['foto_ktm'] = 'uploads/' . $newName2;
        }

        // Update data di database
        $this->userModel->update($id, $data);

        // Redirect ke halaman daftar mahasiswa
        return redirect()->to('/users')->with('success', 'Data berhasil diperbarui.');
    }




    // Hapus data
    public function delete($id)
    {
        $user = $this->userModel->find($id);

        $pathFoto = ROOTPATH . 'public/' . $user['foto_mahasiswa'];

        if ($this->userModel->delete($id)) {
            unlink($pathFoto);
            return redirect()->to('/users')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->to('/users')->with('error', 'Data gagal dihapus.');
        }
    }

    public function view($id)
    {
        // Koneksi database
        $db = \Config\Database::connect();

        // Query untuk mendapatkan data user dengan join ke tabel kelas
        $builder = $db->table('users');
        $builder->select('users.id_mahasiswa, users.nama_mahasiswa, users.foto_mahasiswa, users.foto_ktm, users.jenis_kelamin, kelas.nama_kelas');
        $builder->join('kelas', 'kelas.id_kelas = users.id_kelas', 'left');
        $builder->where('users.id_mahasiswa', $id);

        // Ambil data user
        $user = $builder->get()->getRowArray();

        // Jika user tidak ditemukan, tampilkan halaman 404
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa tidak ditemukan');
        }

        // Kirim data ke view
        return view('user/view', ['user' => $user]);
    }
}
