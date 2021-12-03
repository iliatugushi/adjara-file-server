<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sakme_id');
            $table->string('identifikator');
            $table->string('path');
            $table->string('name');
            $table->string('mime_type');
        });
    }


    //       `id` int(11) NOT NULL AUTO_INCREMENT,
    //   `file_id` int(11) NOT NULL,
    //   `information_object_id` int(11) DEFAULT NULL,
    //   `mime_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
    //   `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
    //   `path` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
    //   `byte_size` int(11) DEFAULT NULL,
    //   `checksum` varchar(255) COLLATE utf8_bin DEFAULT NULL,
    //   `checksum_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
    //   `parent_id` int(11) DEFAULT NULL,

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
