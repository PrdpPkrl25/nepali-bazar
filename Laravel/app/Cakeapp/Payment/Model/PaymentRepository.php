<?php

namespace App\Cakeapp\Payment\Model;



use App\Cakeapp\Common\Eloquent\Repository;

class PaymentRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Payment::class;
    }

    public function handleCreate($request)
    {
        $payment = $this -> create($request -> all());
        return $payment;
    }

    public function showData($id)
    {
        $payment = $this -> findOrFail($id);
        return $payment;
    }

    public function handleDelete($id)
    {
        $payment = $this -> findOrFail($id);
        $payment -> delete();
    }

}
