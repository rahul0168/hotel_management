<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function getadmindata($data)
    {
        $builder = $this->db->table('login');

        $builder->where($data);
        //$result = $builder->get();
        $result = $builder->get()->getResult();

        return $result;
    }
    public function getadmin($data)
    {

        $builder = $this->db->table('login');

        $builder->where($data);

        $data = $builder->get()->getRow();
        return $data;

    }
    public function getOne($table, $data)
    {
        $builder = $this->db->table($table);
        $builder->where($data);
        $data = $builder->get()->getRow();
        return $data;

    }
      public function verifyemail($email)
    {

        $builder = $this->db->table('login');
        $builder->select('id,username');
        $builder->where('email', $email);
        $result = $builder->get();

        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        }

    }

    
}
