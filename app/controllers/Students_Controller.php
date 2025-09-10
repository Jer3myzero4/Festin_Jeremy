<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Students_Controller extends Controller {


   

    

    public function get_all(){
     
        $students = $this->Students_Model->all();

       $this->call->view('/crudORM/lists', ['students' => $students]);


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