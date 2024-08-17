<?php

namespace App\Http\Controllers\Api\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Traits\Gateways\DigitoPayTrait;
use Illuminate\Http\Request;

use App\Http\Controllers\Integrations\AresSMSService;


class DepositController extends Controller
{
    use DigitoPayTrait;

    /**
     * @param Request $request
     * @return array|false[]
     */
    public function submitPayment(Request $request)
    {
        $userData = $request->all();

        // ----   Send SMS/WHATSAPP   ---- 
        $payload = [
            "cpf" => !empty($userData['cpf']) ? $userData['cpf'] : null,
            "name" => auth('api')->user()->name,
            "email" => auth('api')->user()->email,
            "type" => 'new-pix',
            "event_identify" => 'Pix Gerado',
            "phone" => auth('api')->user()->phone,
            "username" => !empty($userData['username']) ? $userData['username'] : null,
            "checkout" => !empty($userData['checkout']) ? $userData['checkout'] : null,
            "value" => !empty($userData['amount']) ? $userData['amount'] : null
        ];
        AresSMSService::sendSMS($payload);
        // ----   Send SMS/WHATSAPP   ---- 

        return self::digitoPayRequestQrcode($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function consultStatusTransactionPix(Request $request)
    {
        return self::consultStatusTransactionPix($request);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deposits = Deposit::whereUserId(auth('api')->id())->paginate();
        return response()->json(['deposits' => $deposits], 200);
    }

}
