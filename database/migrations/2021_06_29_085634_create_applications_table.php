<?php

use App\Models\Application;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueID')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('business_id')->nullable()->constrained('businesses')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('certification_categories')->onDelete('cascade');
            $table->float('total_amount', 32)->default(0); // Total Amount to be Paid
            $table->float('paid_amount', 32)->default(0); // Total Amount Paid
            $table->date('expiration_date')->nullable(); // Mkutano itakwisha?
            $table->enum('_status', [Application::PROCESSING, Application::APPROVED, Application::REJECTED])->default(Application::PROCESSING);
            
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
        Schema::dropIfExists('applications');
    }
}
