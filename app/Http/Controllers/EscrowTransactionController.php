<?php

namespace App\Http\Controllers;

use App\Models\EscrowTransaction;
use App\Requests\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EscrowTransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function newEscrowTransaction(Request $request, EscrowTransaction $escrowTransaction)
    {
        $payload = $request->all();
        $validator = Validator::make($payload, Rules::get('CREATE_ESCROW_TRANSACTION'));
        if ($validator->fails()) {
            return $this->validationErrors($validator->getMessageBag()->all());
        }

        $transaction = $escrowTransaction->storeTransaction($payload);
        if ($transaction) {
            return $this->withData($transaction);
        }
        return $this->error("Something went wrong, Please try again");
    }

    public function updateEscrowTransaction($transaction_id, Request $request, EscrowTransaction $escrowTransaction)
    {
        $payload = $request->all();
        $validator = Validator::make($payload, Rules::get('CREATE_ESCROW_TRANSACTION'));
        if ($validator->fails()) {
            return $this->validationErrors($validator->getMessageBag()->all());
        }
        $transaction = $escrowTransaction->updateTransaction($transaction_id, $payload);
        if ($transaction) {
            return $this->withData($transaction);
        }
        return $this->error("Cannot find transaction");
    }

    public function deleteEscrowTransaction($transaction_id, EscrowTransaction $escrowTransaction)
    {
        $escrowTransaction->deleteTransaction($transaction_id);
        $this->success("Escrow transaction successfully deleted");
    }
}
