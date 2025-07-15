<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\Services;
use App\Models\ExpenseCategory;
use App\Models\Site\About;
use App\Models\Site\BlogCategory;
use App\Models\Site\Slider;
use App\Models\Site\Blog;
use App\Models\User\Expense;
use App\Models\User\User;
use Illuminate\Http\Request;

class FamilyController extends Controller
{

    public function index()
    {
        //dd(auth('user')->user());
        $familyMembers = User::where('parent_id', auth('user')->user()->id)->orWhere('id',auth('user')->user()->id)->get();

        return view('site.pages.user.family.index',compact('familyMembers'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_parent = true;
        $user->parent_id = auth('user')->user()->id;

        $saved = $user->save();

        if ($saved){
            return redirect()->route('user.family')->with('success', 'Aile bireyi eklendi.');
        }
        else{
            return redirect()->back()->with('error', 'Aile bireyi eklenirken bir hata oluştu.');
        }

    }

}
