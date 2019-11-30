<?php

namespace App\Http\Controllers\Api;

use App\Expense;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class ExpenseController extends Controller
{
    public function list()
    {
        $expenses = Expense::latest()
            ->get();

        $result = [];
        foreach ($expenses as $exp) {
            array_push($result, [
                'id' => $exp->id,
                'item' => $exp->item,
                'amount' => number_format($exp->amount, 2),
                'date' => Carbon::parse($exp->created_at)->diffForHumans(),
            ]);
        }

        return response()->json([
            'msg' => 'List of expenses',
            'data' => $result,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item' => 'required',
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            $status = 500;
        } else {

            $expense = new Expense;
            $expense->item = $request->item;
            $expense->amount = $request->amount;
            $expense->save();

            $msg = "New expense has been added";
            $status = 200;
        }
        return response()->json([
            'msg' => $msg,
            'data' => [],
        ], $status);
    }

    public function view(Expense $expense)
    {
        if (!$expense) {
            $msg = "Item not found";
            $data = [];
            $status = 500;
        } else {
            $msg = 'Expense detail - ' . $expense->item;
            $data = $expense;
            $status = 200;
        }
        return response()->json([
            'msg' => $msg,
            'data' => $data,
        ], $status);
    }

    public function update(Request $request, Expense $expense)
    {
        $validator = Validator::make($request->all(), [
            'item' => 'required',
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            $status = 500;
        } else {

            $expense->item = $request->item;
            $expense->amount = $request->amount;
            $expense->save();

            $msg = "Expense has been updated";
            $status = 200;
        }
        return response()->json([
            'msg' => $msg,
            'data' => [],
        ], $status);
    }

    public function delete(Expense $expense)
    {
        if (!$expense) {
            $msg = "Item not found";
            $status = 500;
        } else {
            $expense->delete();

            $msg = "Expense has been deleted";
            $status = 200;
        }
        return response()->json([
            'msg' => $msg,
            'data' => [],
        ], $status);
    }
}
