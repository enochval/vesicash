<?php


namespace App\Requests;


class Rules
{
    const RULES = [
        'CREATE_ESCROW_TRANSACTION' => [
            'sender_email' => 'required|email',
            'sender_phone' => 'required|numeric',
            'recipient_email' => 'required|email',
            'recipient_phone' => 'required|numeric',
            'items' => 'required|array',
            'items.*.title' => 'required|string',
            'items.*.description' => 'required|string',
            'items.*.price' => 'required|numeric'
        ]
    ];

    public static function get($rule)
    {
        return data_get(self::RULES, $rule);
    }

}
