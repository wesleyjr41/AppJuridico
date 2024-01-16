<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class ViewClient extends Component
{
    public $view_student_id;

    public function viewStudentDetails($id){
        $cliente = Cliente::find($id);
        $this->view_student_id = $cliente;
        
        $this->dispatchBrowserEvent('show-view-student-modal');
    }

    public function closeViewStudentModal(){
        
        $this->view_student_id = '';
    }


    public function render()
    {
       
        return view('livewire.view-client' );
    }

    
}
