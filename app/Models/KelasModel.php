<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas'; // Nama tabel
    protected $primaryKey = 'id_kelas'; // Primary key

    // Kolom-kolom yang diizinkan untuk diisi
    protected $allowedFields = [
        'nama_kelas',
        // 'deskripsi_kelas'
    ];

    // Timestamps
    protected $useTimestamps = false; // Nonaktifkan jika tidak menggunakan kolom created_at dan updated_at

    // Validation rules
    protected $validationRules = [
        'nama_kelas' => 'required|max_length[100]',
        // 'deskripsi_kelas' => 'max_length[255]'
    ];

    protected $validationMessages = [
        'nama_kelas' => [
            'required' => 'Nama kelas harus diisi.',
            'max_length' => 'Nama kelas tidak boleh lebih dari 100 karakter.'
        ],
        // 'deskripsi_kelas' => [
        //     'max_length' => 'Deskripsi kelas tidak boleh lebih dari 255 karakter.'
        // ]
    ];
}
