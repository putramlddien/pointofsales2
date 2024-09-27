<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriMenuModel extends Model
{
    protected $table      = 'kategori_menu';
    protected $primaryKey = 'id_kategori';

    protected $allowedFields = ['nama_kategori'];

    // Fungsi untuk mendapatkan semua kategori
    public function getKategori()
    {
        return $this->findAll();
    }

    // Fungsi untuk mendapatkan kategori berdasarkan ID
    public function getKategoriById($id)
    {
        return $this->find($id);
    }

    // Fungsi untuk menambahkan kategori baru (admin/chef only)
    public function insertKategori($data)
    {
        return $this->insert($data);
    }

    // Fungsi untuk mengupdate kategori (admin/chef only)
    public function updateKategori($id, $data)
    {
        return $this->update($id, $data);
    }

    // Fungsi untuk menghapus kategori (admin/chef only)
    public function deleteKategori($id)
    {
        return $this->delete($id);
    }
}
