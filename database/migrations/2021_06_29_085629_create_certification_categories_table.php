<?php

use App\Models\CertificationCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certification_type_id')->constrained('certification_types')->onDelete('cascade');
            $table->string('name');
            $table->float('price', 32)->default(0); // per square foot per month.
            $table->integer('period')->default(12); // number of months before expires.
            $table->text('description')->nullable();
            $table->enum('_status', [CertificationCategory::ACTIVE, CertificationCategory::INACTIVE])->default(CertificationCategory::ACTIVE);
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
        Schema::dropIfExists('certification_categories');
    }
}
