<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pasien\UpdateRequest;
use App\Services\PasienService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    //
    public function showProfile()
    {
        $page_title = 'Profile Anda';
        $page_description = 'Informasi anda yang telah tersimpan ke dalam sistem.';
        $data = request()->user();
        return view('user.profile', compact('page_title', 'page_description', 'data'));
    }

    public function updateProfile(UpdateRequest $request, PasienService $service)
    {
        $update = $service->update(auth()->id(), $request->except(['email', '_token', '_method', 'password_confirmation']));
        if($update) {
            $msg['color'] = 'primary';
            $msg['success'] = true;
            $msg['message'] = 'Berhasil update data!';
            Session::flash('message', $msg);
            return Redirect::back();
        } else {
            $msg['color'] = 'danger';
            $msg['success'] = false;
            $msg['message'] = 'Gagal update data!';
            Session::flash('message', $msg);
            return Redirect::back()->withInput();
        }
    }
}
