<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RolePermisionController extends Controller
{
    function index() {
        return view('admin.role.index');
    }
}
