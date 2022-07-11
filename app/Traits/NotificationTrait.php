<?php

namespace App\Traits;


trait NotificationTrait {


     /**
     * Create sweet modal
     *
     * @param mixed $modalType
     * @param Array $attributes
     * 
     * @return void
     * 
     */
    public function swalModal($modalType, Array $attributes)
    {
        $this->dispatchBrowserEvent('swal:'.$modalType, $attributes);
    }


}