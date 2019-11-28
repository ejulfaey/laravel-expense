<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Expense;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {

    $expenses = Expense::latest()
        ->get();
    $total = Expense::sum('amount');

    return view('expenses', [
        'total' => $total,
        'expenses' => $expenses,
    ]);
});

Route::post('/store', function (Request $request) {

    $request->validate([
        'item' => 'required',
        'amount' => 'required|numeric',
    ], [
        'item.required' => 'Item is required',
        'amount.required' => 'Amount is required',
        'amount.numeric' => 'Amount should be number',
    ]);

    $expense = new Expense();
    $expense->item = $request->item;
    $expense->amount = $request->amount;
    $expense->save();

    return back();
});

Route::get('/edit/{id}', function ($id) {
    $expense = Expense::find($id);
    $expenses = Expense::latest()
        ->get();
    $total = Expense::sum('amount');

    return view('update', [
        'expense' => $expense,
        'total' => $total,
        'expenses' => $expenses,
    ]);
});

Route::post('/update/{id}', function (Request $request, $id) {

    $request->validate([
        'item' => 'required',
        'amount' => 'required|numeric',
    ], [
        'item.required' => 'Item is required',
        'amount.required' => 'Amount is required',
        'amount.numeric' => 'Amount should be number',
    ]);

    $expense = Expense::find($id);
    $expense->item = $request->item;
    $expense->amount = $request->amount;
    $expense->save();

    return redirect('/');
});


Route::get('/delete/{id}', function ($id) {
    $expense = Expense::find($id);
    $expense->delete();
    return back();
});
