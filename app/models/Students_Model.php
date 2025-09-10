<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Students_Model extends Model {
	

    protected $table = 'students';
    protected $primary_key = 'id';

    


  

   public function create($firstname, $lastname, $email)
    {
        return $this->insert([
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'email'     => $email
        ]);
    }
    
    public function get_one($id){
        return $this->db->table('students')->where('id', $id)->get();
    }

    public function updateStudent($firstname, $lastname, $email, $id){
        $data = [
        'firstname' => $firstname,
        'lastname'  => $lastname,
        'email' => $email
    ];
    return $this->db->table('students')->where('id', $id)->update($data);
    }

      public function delete($id){
        return $this->db->table('students')->where('id', $id)->delete();
    }
































    

}


?>