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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('siteName')->nullable();
            $table->string('siteTitle')->nullable();
            $table->string('siteDesc')->nullable();
            $table->string('siteKeywords')->nullable();
            $table->string('siteCopywriteMetni')->nullable();
            $table->string('siteLogosu')->nullable();
            $table->string('siteMailAdresi')->nullable();
            $table->string('siteEmailSifresi')->nullable();
            $table->string('host')->nullable();
            $table->string('siteAdresi')->nullable();
            $table->string('DolarKuru')->nullable();
            $table->string('EuroKuru')->nullable();
            $table->string('kargoBaraji')->nullable();
            $table->string('SosyalLinkFacebook')->nullable();
            $table->string('SosyalLinkTwitter')->nullable();
            $table->string('SosyalLinkInstagram')->nullable();
            $table->string('SosyalLinkLinkedin')->nullable();
            $table->string('SosyalLinkYoutube')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
