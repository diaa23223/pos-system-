<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المورد
            $table->string('company_name')->nullable(); // اسم الشركة (لو موجود)
            $table->string('email')->nullable(); // بريد المورد
            $table->string('phone')->nullable(); // رقم الهاتف
            $table->text('address')->nullable(); // العنوان
            $table->string('tax_number')->nullable(); // رقم ضريبي (لو فيه)
            $table->string('status')->default('active'); // active / inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
