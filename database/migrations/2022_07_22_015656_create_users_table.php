<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 32)->unique();
            $table->string('username', 50);
            $table->string('password', 200);
            $table->string('phone', 100)->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->integer('parent_id')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->string('closed bool')->default(0);
            $table->string('code')->unique()->nullable();
            $table->tinyInteger('social_type')->nullable();
            $table->tinyInteger('social_id')->unique()->nullable();
            $table->string('social_name')->nullable();
            $table->string('social_nickname')->nullable();
            $table->string('social_avatar')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
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
};
