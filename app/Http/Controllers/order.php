<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order as OrderModel;
use DB;

class order extends Controller
{
	public function addNewOrder($collection)
	{

		foreach($collection['orders'] as $i => $v)
		{

			OrderModel::create([
				'order_no' => $v['ORDER_NO'],
				'agent'    => $v['AGENT'],
				'customer' => $v['CUSTOMER'],
				'status'   => $v['STATUS'],
				'product'  => $v['PRODUCT'],
				'sku'      => $v['SKU'],
				'total_award_point' => $v['TOTAL_AWARD_POINT'],
				'discount' => $v['DISCOUNT'],
				'subtotal' => $v['SUBTOTAL'],
				'created_at' => $v['ORDER_CREATED_AT']
			]); 

		}

	}

}
