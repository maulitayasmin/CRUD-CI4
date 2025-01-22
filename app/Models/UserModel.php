<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nama tabel
    protected $primaryKey = 'id_mahasiswa'; // Primary key tabel

    // Kolom yang diizinkan untuk diisi (mass assignment)
    protected $allowedFields = [
        'nama_mahasiswa',
        'foto_mahasiswa',
        'foto_ktm',
        'jenis_kelamin',
        'id_kelas'
    ];

    // Mengaktifkan fitur soft delete (jika diperlukan)
    protected $useSoftDeletes = false;

    // Tipe data yang dikembalikan
    protected $returnType = 'array';

    // Pengaturan validasi (opsional, jika dibutuhkan)
    protected $validationRules = [
        'nama_mahasiswa' => 'required|min_length[3]|max_length[255]',
        // 'foto_mahasiswa' => 'permit_empty|valid_url|max_length[255]',
        'jenis_kelamin'  => 'required|in_list[Pria,Perempuan]',
    ];

    protected $validationMessages = [
        'nama_mahasiswa' => [
            'required' => 'Nama mahasiswa harus diisi.',
            'min_length' => 'Nama mahasiswa minimal 3 karakter.',
            'max_length' => 'Nama mahasiswa maksimal 255 karakter.',
        ],
        'foto_mahasiswa' => [
            'valid_url' => 'Foto mahasiswa harus berupa URL yang valid.',
        ],
        'foto_ktm' => [
            'valid_url' => 'Foto mahasiswa harus berupa URL yang valid.',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin harus diisi.',
            'in_list' => 'Jenis kelamin hanya dapat berisi Pria atau Perempuan.',
        ],
    ];

    protected $skipValidation = false; // Nonaktifkan validasi jika tidak diperlukan
}
