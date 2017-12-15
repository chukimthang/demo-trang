<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bill;
use App\BillDetail;

class BillsController extends Controller
{
    public function index()
    {
        $bills = Bill::all();

        return view('admin.bill.index', compact('bills'));
    }

    public function show($id)
    {
        if ($id) {
            $bill = Bill::find($id);
            $billDetails = BillDetail::listProductOrder($id)->get();
            
            return view('admin.bill.show', compact('bill', 'billDetails'));
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $bill = Bill::find($id);
        $status = config('common.status_bill');
        
        switch ($bill->status) {
            case 2:
                unset($status[1]);
                break;
            case 3:
                unset($status[1]);
                unset($status[2]);
                unset($status[4]);
                break;
            case 4:
                unset($status[1]);
                unset($status[2]);
                unset($status[3]);
                break;
            case 5:
                unset($status[1]);
                unset($status[2]);
                unset($status[3]);
                unset($status[4]);
                break;
            default:
                break;
        }

        return view('admin.bill.edit', compact('status', 'bill'));
    }

    public function update(Request $request)
    {
        $id = $request->billId;
        $data = $request->only('status');
        $bill = Bill::find($id);
        $bill->update($data);

        return response()->json(['status' => 200]);
    }
}
