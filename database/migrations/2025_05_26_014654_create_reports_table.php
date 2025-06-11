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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // من أنشأ التقرير
            $table->string('title');               // عنوان التقرير
            $table->text('description')->nullable(); // وصف اختياري
            $table->string('type');
            $table->json('filters')->nullable();    // الفلاتر المستخدمة في التقرير (مثل التواريخ)
            $table->timestamps();                   // created_at + updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
