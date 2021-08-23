<?php

use App\Modules\Users\Enums\AdminEnum;
use App\Modules\Users\Enums\UserEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type' , UserEnum::usersTypes())->index(); // required
            $table->string('name')->nullable();
            $table->mediumText('address')->nullable(); //address
            $table->string('email')->nullable()->index();
            $table->string('mobile_number')->index(); //required
            $table->string('password')->nullable(); //required
            $table->boolean('is_active')->nullable()->default(1)->index();
            $table->string('profile_picture', 190)->nullable();

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
        Schema::dropIfExists('users');
    }
}
