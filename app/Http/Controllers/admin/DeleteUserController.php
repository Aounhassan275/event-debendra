<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NormalUser;

class DeleteUserController extends Controller
{
    public function destroy($id)
    {
        $user = NormalUser::findOrFail($id);
        $user->delete();
    
        return redirect()->route('normal_users.index')->with('success', 'User deleted successfully.');
    }
    

}
