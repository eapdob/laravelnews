<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolePermisionController extends Controller
{
    function index() {
        return view('admin.role.index');
    }
}
