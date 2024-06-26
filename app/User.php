<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['balance'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function payouts()
    {
        return $this->hasMany(Payout::class);
    }

    public function credit(int $amount)
    {
        $this->balance += $amount;
        $this->save();

        $payment = new Payment([
            'user_id' => $this->id,
            'amount' => $amount,
        ]);
        $payment->save();
    }

    public function debit(int $amount)
    {
        $this->balance -= $amount;
        $this->save();

        $payout = new Payout([
            'user_id' => $this->id,
            'amount' => $amount,
        ]);
        $payout->save();
    }
}
