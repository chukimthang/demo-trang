<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReceiverInfoRequest;
use Illuminate\Support\Facades\DB;
use App\ReceiverInfo;
use App\Product;
use App\Bill;
use App\BillDetail;
use Cart;
use Auth;

class BillsController extends Controller
{
    public function postAddAjax(ReceiverInfoRequest $request)
    {
        try {
            DB::beginTransaction();

            $dataReceiver = $request->only('phone', 'address_receive', 'note');
            $receiver = ReceiverInfo::create($dataReceiver);

            if (!$receiver->id) {
                DB::rollback();
            }

            $total_price = Cart::subtotal(0, 0, '');
            $dataOrder = [
                'total' => $total_price,
                'status' => 1,
                'user_id' => Auth::getUser()->id,
                'receiver_info_id' =>  $receiver->id
            ];
            $bill = Bill::create($dataOrder);

            if (!$bill->id) {
                DB::rollback();
            }

            $cart = Cart::content();

            foreach ($cart as $item) {
                $dataDetail = [
                    'quantity' => $item->qty,
                    'product_id' => $item->id,
                    'bill_id' => $bill->id
                ];
                BillDetail::create($dataDetail);

                $product = Product::find($item->id);
                $dataProduct = [
                    'quantity' => $product->quantity - $item->qty
                ];
                $product->update($dataProduct);
            }

            Cart::destroy();

            DB::commit();

            return view('cart.list', compact('cart'));
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
