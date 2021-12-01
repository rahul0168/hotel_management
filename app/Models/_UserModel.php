<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function roominfo()
    {

        $builder = $this->db->table('rooms');
        //$builder->where('id', '1');
        //$result = $builder->get();
        $result = $builder->get()->getResult();

        return $result;

        // if (count($result->getResultArray()) == 1) {
        //     return $result->getRow();
        // }
    }

    public function roomcart($id)
    {
        $builder = $this->db->table('rooms');
        $builder->select('room_type,room_no,status,price,id');
        $builder->where('id', $id);
        //$result = $builder->get();
        $result = $builder->get()->getResult();

        return $result;
    }

    public function createuser($data)
    {

        $builder = $this->db->table('bookinginfo');
        $res = $builder->insert($data);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function updatestatus($id)
    {
        $builder = $this->db->table('rooms');
        $builder->where('id', $id);
        $builder->update(['status' => '1']);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function addroom($data)
    {

        $builder = $this->db->table('rooms');
        $res = $builder->insert($data);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function updateroom($roomdata, $id)
    {
        $builder = $this->db->table('rooms');
        $builder->where('id', $id);
        $builder->update($roomdata);

        if ($this->db->affectedRows() > 0) {
            return true;
        }

    }

    public function getoneroom($id)
    {
        $builder = $this->db->table('rooms');
        $builder->where('id', $id);

        $data = $builder->get()->getRow();
        return $data;

    }

    public function getallrooms()
    {
        $builder = $this->db->table('rooms');
        $data = $builder->get()->getRow();
        return $data;

    }

    public function deleteroom($id)
    {
        $builder = $this->db->table('rooms');
        $builder->where($id);
        $builder->delete();

        if ($this->db->affectedRows() > 0) {
            return true;
        }

    }

    public function addData($table, $data)
    {
        $this->db->table($table)->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }
    public function getOne($table, $data)
    {
        $builder = $this->db->table($table);
        $builder->where($data);
        $data = $builder->get()->getRow();
        return $data;

    }

}
