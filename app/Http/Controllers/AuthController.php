<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Product;


class AuthController extends Controller
{
    public function profile(){
        return view('/profile_admin');
    }

    //  public function update(Request $request, $id){
    //     $product = Product::findOrFail($id);
    //     $product->update($request->all());
    //  }

  
}
