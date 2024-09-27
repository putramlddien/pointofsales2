<?php

namespace App\Controllers;

use App\Models\KategoriMenuModel;
use CodeIgniter\Controller;

class KategoriMenuController extends Controller
{
    protected $kategoriMenuModel;
    protected $session;

    public function __construct()
    {
        $this->kategoriMenuModel = new KategoriMenuModel();
        $this->session = session();
    }

    // Fungsi untuk menampilkan daftar kategori
    public function index()
    {
        $data['kategori'] = $this->kategoriMenuModel->getKategori();

        // Cek role user
        if ($this->session->get('role') == 'admin') {
            return view('admin/kategori_menu', $data);
        } else {
            return view('customer/kategori_menu', $data);
        }
    }

    // Fungsi untuk menambahkan kategori (admin/chef only)
    public function create()
    {
        if ($this->session->get('role') != 'admin' && $this->session->get('role') != 'chef') {
            return redirect()->to('/kategori_menu')->with('error', 'Access denied');
        }

        // Validasi input
        if ($this->request->getMethod() === 'post') {
            $this->kategoriMenuModel->insertKategori([
                'nama_kategori' => $this->request->getPost('nama_kategori'),
            ]);
            return redirect()->to('/kategori_menu')->with('success', 'Kategori added successfully');
        }

        return view('kategori_menu/create');
    }

    // Fungsi untuk mengedit kategori (admin/chef only)
    public function edit($id)
    {
        if ($this->session->get('role') != 'admin' && $this->session->get('role') != 'chef') {
            return redirect()->to('/kategori_menu')->with('error', 'Access denied');
        }

        $data['kategori'] = $this->kategoriMenuModel->getKategoriById($id);

        // Validasi input
        if ($this->request->getMethod() === 'post') {
            $this->kategoriMenuModel->updateKategori($id, [
                'nama_kategori' => $this->request->getPost('nama_kategori'),
            ]);
            return redirect()->to('/kategori_menu')->with('success', 'Kategori updated successfully');
        }

        return view('kategori_menu/edit', $data);
    }

    // Fungsi untuk menghapus kategori (admin/chef only)
    public function delete($id)
    {
        if ($this->session->get('role') != 'admin' && $this->session->get('role') != 'chef') {
            return redirect()->to('/kategori_menu')->with('error', 'Access denied');
        }

        $this->kategoriMenuModel->deleteKategori($id);
        return redirect()->to('/kategori_menu')->with('success', 'Kategori deleted successfully');
    }
}
