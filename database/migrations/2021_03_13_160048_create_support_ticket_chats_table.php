<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_ticket_chats', function (Blueprint $table) {
            $table->id(); // = bigInterger()->unsigned()
            $table->bigInteger('ticket_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('message');
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('support_tickets')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_ticket_chats');
    }
}
