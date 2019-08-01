<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscrowTransaction extends Model
{
    protected $fillable = [
        'sender_email', 'sender_phone', 'recipient_email', 'recipient_phone', 'items'
    ];

    public function setItemsAttribute($value)
    {
        $this->attributes['items'] = json_encode($value);
    }

    public function getItemsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function storeTransaction($payload)
    {
        return $this->create($payload);
    }

    public function updateTransaction($transaction_id, $payload)
    {
        $transaction = $this->find($transaction_id);
        if ($transaction) {
            $transaction->update($payload);
            return $transaction->refresh();
        }
        return false;
    }

    public function deleteTransaction($transaction_id)
    {
        return $this->destroy($transaction_id);
    }
}
