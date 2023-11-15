<?php

namespace App\Service\Midtrans;

use App\Models\Transaction;
use App\Models\User;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order,$user;

    public function __construct(Transaction $order,User $user)
    {
        parent::__construct();

        $this->order = $order;
        $this->user = $user;
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->code,
                'gross_amount' => $this->order->transaction_total,
            ],
            'customer_details' => [
                'first_name' => $this->user->name ?? 'Customer',
                'email' => $this->user->email ?? 'Customer@mail.com',

            ]
        ];


        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
