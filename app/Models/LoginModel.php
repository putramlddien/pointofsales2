<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';

    // Untuk admin dan chef
    public function validateAdminChef($username, $password)
    {
        return $this->where('username', $username)->where('password', $password)->first();
    }

    // Untuk customer
    public function createOrValidateCustomer($nomor_whatsapp)
    {
        // Cek jika customer sudah terdaftar
        $customer = $this->db->table('customers')
            ->where('nomor_whatsapp', $nomor_whatsapp)
            ->get()
            ->getRow();

        if (!$customer) {
            // Insert customer baru jika belum terdaftar
            $data = ['nomor_whatsapp' => $nomor_whatsapp];
            $this->db->table('customer')->insert($data);
            return true;
        }

        return true;
    }
}
