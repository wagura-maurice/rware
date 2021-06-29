<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const PROCESSING = 'processing';
    const ACCEPTED   = 'accepted';
    const REJECTED   = 'rejected';

    protected $fillable = [
        'user_id',
        'partyA',
        'partyB',
        'transactionType',
        'transactionAmount',
        'transactionCode',
        'transactionTimeStamp',
        'transactionDetails',
        'transactionId',
        'accountReference',
        'responseFeedBack',
        '_status'
    ];

    public static $createRules = [
        'user_id'              => 'required|integer',
        'partyA'               => 'required|string',
        'partyB'               => 'required|string',
        'transactionType'      => 'required|integer',
        'transactionAmount'    => 'required|string',
        'transactionCode'      => 'nullable|string',
        'transactionTimeStamp' => 'required|timestamp',
        'transactionDetails'   => 'nullable|string',
        'transactionId'        => 'required|string',
        'accountReference'     => 'required|string',
        'responseFeedBack'     => 'required|string'
    ];

    public static $updateRules = [
        'user_id'              => 'nullable|integer',
        'partyA'               => 'nullable|string',
        'partyB'               => 'nullable|string',
        'transactionType'      => 'nullable|integer',
        'transactionAmount'    => 'nullable|string',
        'transactionCode'      => 'nullable|string',
        'transactionTimeStamp' => 'nullable|timestamp',
        'transactionDetails'   => 'nullable|string',
        'transactionId'        => 'nullable|string',
        'accountReference'     => 'nullable|string',
        'responseFeedBack'     => 'nullable|string'
    ];
}
