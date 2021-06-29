<?php

use App\Models\Campaign;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('platform_id')->unsigned()->constrained('platforms')->onDelete('cascade');
            $table->string('title')->unique();
            $table->longText('description');
            $table->string('cover');
            $table->string('payload');
            $table->enum('_status', [Campaign::ACTIVE, Campaign::INACTIVE])->default(Campaign::ACTIVE);
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
        Schema::dropIfExists('campaigns');
    }
}
