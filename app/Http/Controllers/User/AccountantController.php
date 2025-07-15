<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Expense;
use App\Models\User\User;

class AccountantController extends Controller
{

    public function index()
    {
        //dd(auth('user')->user());
        $user = auth('user')->user();
        if ($user->parent_id == null) {
            // Ana kullanıcı: hem kendisi hem aile bireyleri
            $userIds = User::where('parent_id', $user->id)->pluck('id')->toArray();
            $userIds[] = $user->id;
        } else {
            // Aile bireyi: sadece kendisi
            $userIds = [$user->id];
        }

        $expenses = Expense::with(['category', 'user'])
            ->whereIn('user_id', $userIds)
            ->orderBy('expense_date', 'desc')
            ->limit(10)
            ->get();

        return view('site.pages.user.index',compact('expenses'));
    }

    public function logout(){
        \auth('user')->logout();
        return redirect()->route('user.login')->with('success','Çıkış Yapıldı');
    }

}
