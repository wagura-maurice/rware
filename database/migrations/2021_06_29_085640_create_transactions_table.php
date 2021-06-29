<?php

use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('partyA'); // depositor. ['c2b / lnmo' => $MSISDN, 'b2c' => $ShortCode]
            $table->string('partyB'); // receiver. ['c2b / lnmo' => $ShortCode, 'b2c' => $MSISDN]
            $table->string('transactionType'); // transaction action category. ['in' => ['c2b', 'lnmo'], 'out' => 'b2c']
            $table->float('transactionAmount', 32); // $Amount
            $table->string('transactionCode')->nullable()->unique(); // Nullable on transaction initialization and filled in callback event.
            $table->timestamp('transactionTimeStamp'); // a transaction initialization time stamp.
            $table->text('transactionDetails'); // transaction remark's. e.t.c
            $table->string('transactionId')->unique(); // unique id, to be used in callback query's.
            $table->text('accountReference'); // an account/book number under or held within the receiver where the money is headed, to and fro wise.
            $table->text('responseFeedBack'); // full json response string, as from the processor. json_encode($response)
            $table->enum('_status', [Transaction::PROCESSING, Transaction::ACCEPTED, Transaction::REJECTED])->default(Transaction::PROCESSING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
