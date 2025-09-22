<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Students_Controller extends Controller {


   

    public function get_all(){
        
        $query    = trim($this->io->get('q')) ?: '';
        $page     = (int) $this->io->get('page') ?: 1;
        $per_page = (int) $this->io->get('per_page') ?: 10; 
        if ($per_page <= 0) { $per_page = 10; }
        if ($page <= 0) { $page = 1; }

        
        $students_all = $this->Students_Model->all();


        $get_field = function($row, $key) {
            if (is_array($row)) return isset($row[$key]) ? $row[$key] : '';
            if (is_object($row)) return isset($row->$key) ? $row->$key : '';
            return '';
        };


        if ($query !== '') {
            $q_lower = mb_strtolower($query);
            $students_filtered = array_values(array_filter($students_all, function($s) use ($q_lower, $get_field) {
                $firstname = mb_strtolower($get_field($s, 'firstname'));
                $lastname  = mb_strtolower($get_field($s, 'lastname'));
                $email     = mb_strtolower($get_field($s, 'email'));
                return (mb_strpos($firstname, $q_lower) !== false)
                    || (mb_strpos($lastname, $q_lower) !== false)
                    || (mb_strpos($email, $q_lower) !== false);
            }));
        } else {
            $students_filtered = $students_all;
        }

        $total_items = count($students_filtered);
        $total_pages = (int) max(1, ceil($total_items / $per_page));
        if ($page > $total_pages) { $page = $total_pages; }
        $offset = ($page - 1) * $per_page;
        $students_page = array_slice($students_filtered, $offset, $per_page);

    
        $data = [
            'students'    => $students_page,
            'page'        => $page,
            'per_page'    => $per_page,
            'total_items' => $total_items,
            'total_pages' => $total_pages,
            'query'       => $query,
        ];

        $this->call->view('/crudORM/lists', $data);
    }

      
      

 public function create()
    {
        if ($this->form_validation->submitted()) {
            $lastname  = $this->io->post('lastname');
            $firstname = $this->io->post('firstname');
            $email     = $this->io->post('email');

            $insert_id = $this->Students_Model->create($firstname, $lastname, $email);

          
         $this->call->view('crudORM/create', ['insert_id' => $insert_id]);


        
        } 

    
        $this->call->view('crudORM/create');
    }

    public function update($id)
    {
     if($this->form_validation->submitted()){
            $this->form_validation
                ->name('lastname')
                    ->required('Last name is required')
                ->name('firstname')
                    ->required('First name is required')
                ->name('email')
                    ->required('Email name is required');
            if($this->form_validation->run()){
                $firstname = $this->io->post('firstname');
                $lastname = $this->io->post('lastname');
                $email = $this->io->post('email');


                if($this->Students_Model->updateStudent($firstname, $lastname, $email, $id)){
                    redirect('students/get-all');
                }
            } else {
                redirect('students/get-all');
            }




        }
      

















        $data['stu'] = $this->Students_Model->get_one($id);
        $this->call->view('crudORM/update', $data);
    }

            

      

  public function delete($id){
        if($this->Students_Model->delete($id)){
            redirect('students/get-all');
        } else {
            redirect('students/get-all');
        }

    }


   



}
?>