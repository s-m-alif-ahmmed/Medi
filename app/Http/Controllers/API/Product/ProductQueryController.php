<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\Product;
use App\Models\ProductImport;
use App\Models\SystemSetting;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ProductQueryController extends Controller
{
    use ApiResponse;

    public function result(Request $request)
    {
        $validated = $request->validate([
            'leg' => 'required|in:upper,lower,both',
            'side' => 'required|in:left,right',
            'color_desc' => 'required|in:Black,Beige',

            // Lower leg
            'cc' => 'nullable|numeric',
            'cb1' => 'nullable|numeric',
            'cb' => 'nullable|numeric',
            'lower_length' => 'nullable|numeric',

            // Upper leg
            'cg' => 'nullable|numeric',
            'ce1' => 'nullable|numeric',
            'cd' => 'nullable|numeric',
            'upper_length' => 'nullable|numeric',
        ]);

        $legs = $validated['leg'] === 'both' ? ['upper', 'lower'] : [$validated['leg']];
        $sides = [$validated['side']];
        $color = $validated['color_desc'];

        $match = null;

        foreach ($sides as $side) {
            $query = ProductImport::where('side', $side)
                ->where('color_desc', $color);

            // Lower leg matching
            if (in_array('lower', $legs)) {
                $query->where(function ($q) use ($validated) {
                    if ($validated['cc']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cC, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cC, '-', -1) AS UNSIGNED)", [$validated['cc']]);
                    }
                    if ($validated['cb1']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cB1, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cB1, '-', -1) AS UNSIGNED)", [$validated['cb1']]);
                    }
                    if ($validated['cb']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cB, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cB, '-', -1) AS UNSIGNED)", [$validated['cb']]);
                    }
                    if ($validated['lower_length']) {
                        $q->whereRaw("? < CAST(REPLACE(lmall_D1, '<', '') AS UNSIGNED)", [$validated['lower_length']]);
                    }
                });
            }

            // Upper leg matching
            if (in_array('upper', $legs)) {
                $query->where(function ($q) use ($validated) {
                    if ($validated['cg']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cG, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cG, '-', -1) AS UNSIGNED)", [$validated['cg']]);
                    }
                    if ($validated['ce1']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cE1, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cE1, '-', -1) AS UNSIGNED)", [$validated['ce1']]);
                    }
                    if ($validated['cd']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cD, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cD, '-', -1) AS UNSIGNED)", [$validated['cd']]);
                    }
                    if ($validated['upper_length']) {
                        $q->whereRaw("? < CAST(REPLACE(lE_G, '<', '') AS UNSIGNED)", [$validated['upper_length']]);
                    }
                });
            }

            $match = $query->first();
            if ($match) break;
        }

        if (!$match) {
            return $this->error('No matching SKU found', 404);
        }

        return $this->success('Match Found: SKU', $match, 200);
    }

    public function findSKU(Request $request)
    {
        $validated = $request->validate([
            'leg' => 'required|in:upper,lower,both',
            'side' => 'required|in:left,right,both',
            'color_desc' => 'required|string',

            // Lower leg
            'cc' => 'nullable|numeric',
            'cb1' => 'nullable|numeric',
            'cb' => 'nullable|numeric',
            'lower_length' => 'nullable|numeric',

            // Upper leg
            'cg' => 'nullable|numeric',
            'ce1' => 'nullable|numeric',
            'cd' => 'nullable|numeric',
            'upper_length' => 'nullable|numeric',

            // User
            'email' => 'required|email',
            'additional_note' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        $legs = $validated['leg'] === 'both' ? ['upper', 'lower'] : [$validated['leg']];
        $sides = [$validated['side']];
        $color = $validated['color_desc'];

        $match = null;

        foreach ($sides as $side) {
            $query = ProductImport::where('side', $side)
                ->where('color_desc', $color);

            // Lower leg matching
            if (in_array('lower', $legs)) {
                $query->where(function ($q) use ($validated) {
                    if ($validated['cc']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cC, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cC, '-', -1) AS UNSIGNED)", [$validated['cc']]);
                    }
                    if ($validated['cb1']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cB1, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cB1, '-', -1) AS UNSIGNED)", [$validated['cb1']]);
                    }
                    if ($validated['cb']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cB, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cB, '-', -1) AS UNSIGNED)", [$validated['cb']]);
                    }
                    if ($validated['lower_length']) {
                        $q->whereRaw("? < CAST(REPLACE(lmall_D1, '<', '') AS UNSIGNED)", [$validated['lower_length']]);
                    }
                });
            }

            // Upper leg matching
            if (in_array('upper', $legs)) {
                $query->where(function ($q) use ($validated) {
                    if ($validated['cg']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cG, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cG, '-', -1) AS UNSIGNED)", [$validated['cg']]);
                    }
                    if ($validated['ce1']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cE1, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cE1, '-', -1) AS UNSIGNED)", [$validated['ce1']]);
                    }
                    if ($validated['cd']) {
                        $q->whereRaw("? BETWEEN CAST(REPLACE(cD, '<', '') AS UNSIGNED) AND CAST(SUBSTRING_INDEX(cD, '-', -1) AS UNSIGNED)", [$validated['cd']]);
                    }
                    if ($validated['upper_length']) {
                        $q->whereRaw("? < CAST(REPLACE(lE_G, '<', '') AS UNSIGNED)", [$validated['upper_length']]);
                    }
                });
            }

            $match = $query->first();
            if ($match) break;
        }

        if (!$match) {
            return $this->error('No matching SKU found', 404);
        }

        $order_number = 'ORD-' . Str::random(10);

        $order = Order::create([
            'order_number' => $order_number,
            'product_id' => $validated['product_id'],
            'product_query_id' => $match->id,
            'sku' => $match->sku,
            'email' => $validated['email'],
            'additional_note' => $validated['additional_note'],
            'leg' => $validated['leg'],
            'side' => $validated['side'],
            'color_desc' => $validated['color_desc'],
            'cc' => $validated['cc'],
            'cb1' => $validated['cb1'],
            'cb' => $validated['cb'],
            'lower_length' => $validated['lower_length'],
            'cg' => $validated['cg'],
            'ce1' => $validated['ce1'],
            'cd' => $validated['cd'],
            'upper_length' => $validated['upper_length'],
            'status' => 'Pending',
        ]);

        $setting = SystemSetting::first();

        Mail::to($setting->email ?? 'admin@gmail.com')->send(new OrderMail($order));

        return $this->success('Match Found: SKU', $match, 200);
    }


}
