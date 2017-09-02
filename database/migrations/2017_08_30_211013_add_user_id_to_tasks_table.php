<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //メモphp artisan make:migration add_user_id_to_tasks_table --table=tasksにより追加
            $table->integer('user_id')->unsigned()->index();
            //テキスト記載なし
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('users_user_id_foreign');
            $table->dropColumn('user_id');
            //ユーザidをロールバックするカラム
        });
    }
}
