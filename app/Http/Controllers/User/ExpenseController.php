<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use App\Models\User\Expense;
use App\Models\User\User;
use Illuminate\Http\Request;

class ExpenseController extends Controller
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

        $myExpenses = Expense::with(['category', 'user'])
            ->whereIn('user_id', $userIds)
            ->orderBy('id', 'desc')
            ->get();

        return view('site.pages.user.expenses.index',compact('myExpenses'));
    }

    public function create()
    {
        //dd(auth('user')->user());
        $categories = ExpenseCategory::orderBy('name')->get();

        return view('site.pages.user.expenses.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $userId = auth('user')->user()->id;

        // Taksitli mi?
        $isInstallment = $request->has('is_installment');

        if ($isInstallment) {
            $count = (int) $request->installment_count;
            $totalAmount = (float) $request->amount;
            $perInstallment = round($totalAmount / $count, 2); // eşit böl

            $baseDate = new \DateTime($request->expense_date);

            for ($i = 0; $i < $count; $i++) {
                $expense = new Expense();
                $expense->user_id = $userId;
                $expense->category_id = $request->category_id;
                $expense->is_installment = 1;
                $expense->amount = $perInstallment;

                // Açıklama + taksit numarası
                $ct = $i + 1;
                $taksitNotu = " ($ct. taksit)";
                $expense->description = ($request->description ?? '') . $taksitNotu;

                // Tarihi ay ay ilerlet
                $taksitDate = (clone $baseDate)->modify("+$i months");
                $expense->expense_date = $taksitDate->format('Y-m-d');

                $expense->save();
            }

            return redirect()->route('user.expenses.index')->with('success', "$count taksit başarıyla eklendi.");
        }

        // Taksit yoksa tek kayıt
        $expense = new Expense();
        $expense->user_id = $userId;
        $expense->category_id = $request->category_id;
        $expense->amount = $request->amount;
        $expense->description = $request->description ?? null;
        $expense->expense_date = $request->expense_date;

        if ($expense->save()) {
            return redirect()->route('user.expenses.index')->with('success', 'Harcama başarıyla eklendi.');
        }

        return redirect()->back()->with('error', 'Harcama eklenirken bir hata oluştu.');
    }


    public function edit($id)
    {
        $expense = Expense::where('id',$id)->first();
        $categories = ExpenseCategory::orderBy('name')->get();

        return view('site.pages.user.expenses.edit', compact('expense', 'categories'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $expense = Expense::where('id',$id)->first();
        $expense->category_id = $request->category_id;
        $expense->amount = $request->amount;
        $expense->description = $request->description ?? null;
        $expense->expense_date = $request->expense_date;

        $saved = $expense->update();
        if ($saved){
            return redirect()->route('user.expenses.index')->with('success', 'Harcama başarıyla düzenlendi.');
        }
        else{
            return redirect()->back()->with('error', 'Harcama eklenirken bir hata oluştu.');
        }

    }

    public function destroy($id)
    {
        $expense = Expense::where('id',$id)->first();
        $expense->delete();

        return back()->with('success', 'Harcamayı sildin knk 🗑️');
    }




}
