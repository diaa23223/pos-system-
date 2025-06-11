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
        Schema::create('employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee_management')->onDelete('cascade');
            $table->date('start_date'); // تاريخ بداية الإجازة
            $table->date('end_date');   // تاريخ نهاية الإجازة
            $table->enum('type', ['annual', 'sick', 'emergency', 'unpaid'])->default('annual'); // نوع الإجازة
            $table->text('reason')->nullable(); // سبب الإجازة (اختياري)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // حالة الطلب
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_leaves');
    }
};
