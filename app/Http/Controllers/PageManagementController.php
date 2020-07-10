<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidatePageForm;
use App\Page;
use Auth;

class PageManagementController extends Controller
{

    public function store(ValidatePageForm $request) {

        Page::create([
            'name' => request('name'),
            'url' => request('url'),
            'is_enabled' => true,
            'is_locked' => false,
            'user_id' => Auth::id()
        ]);

        return 'ok';
    }
}
