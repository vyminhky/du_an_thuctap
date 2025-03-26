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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique(); // Số hóa đơn
            $table->unsignedBigInteger('order_id'); // Liên kết với đơn hàng
            $table->date('invoice_date'); // Ngày xuất hóa đơn
            $table->decimal('total_amount', 10, 2); // Tổng tiền
            $table->string('payment_method'); // Phương thức thanh toán (tiền mặt, chuyển khoản)
            $table->string('status')->default('pending'); // Trạng thái: pending, paid, canceled
            $table->timestamps();
            
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
