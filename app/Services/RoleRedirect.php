<?php

namespace App\Services;

Class RoleRedirect {

    public function redirect()
    {
        if(auth()->user()->role == 'user')
        {
            return redirect()->intended('/user/dashboard');
        }
        elseif(auth()->user()->role == 'admin')
        {
            return redirect()->intended('/admin/dashboard');
        }
    }
}