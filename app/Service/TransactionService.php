<?php

namespace App\Service;

use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class TransactionService
{
    protected $trxRepo;
    public function __construct(TransactionRepository $trxRepo)
    {
        $this->trxRepo = $trxRepo;
    }

    public function getAll()
    {
        return $this->trxRepo->getAll();
    }

    public function getById($id)
    {
        return $this->trxRepo->getById($id);
    }

    public function getMyTransaction($id)
    {
        return $this->trxRepo->myTransaction($id);
    }

    public function getByCode($code)
    {
        return $this->trxRepo->getByCode($code);
    }

    public function update(Request $request, $id)
    {
        return $this->trxRepo->update($request,$id);
    }

    public function updateProgressTransaction(Request $request, $id)
    {
        return $this->trxRepo->updateProgressTransaction($request,$id);
    }

    public function income()
    {
        return $this->trxRepo->income();
    }

    public function cekCategoryProductTransaction($user)
    {
        return $this->trxRepo->getCategoryByTransactionUser($user);
    }

    public function productUserBuy($user,$category)
    {
        return $this->trxRepo->transaactionProductUser($user,$category);
    }

    public function transactionPending()
    {
        return $this->trxRepo->sumPendingPay();
    }

    public function transactionSuccessUser($user_id)
    {
        return $this->trxRepo->sumSuccsesUser($user_id);
    }

    public function transactionPendingUser($user_id)
    {
        return $this->trxRepo->sumPendingPayUser($user_id);
    }

    public function transactionCancelUser($user_id)
    {
        return $this->trxRepo->sumCancelPayUser($user_id);
    }

    public function fiveLatestTransaction()
    {
        return $this->trxRepo->topFiveTransaction();
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'transaction_total' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->trxRepo->save($request);

        return $result;
    }

    public function delete($id)
    {
        return $this->trxRepo->delete($id);
    }
}
