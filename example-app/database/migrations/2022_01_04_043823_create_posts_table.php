<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * マイグレーションを実行する
     * [php artisan migrate] コマンド実行時にこのメソッドが実行される
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            // １００文字まで
            $table->string('name', 100);
            // １００文字まで・nullを許容する
            $table->string('description', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * マイグレーションを取り消す
     * [php artisan migrate:rollback] コマンド実行時にこのメソッドが実行される
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
