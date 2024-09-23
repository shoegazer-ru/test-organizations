<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->float('sum');
            $table->foreignId('seller')->constrained('organizations')->onDelete('cascade');
            $table->foreignId('buyer')->constrained('organizations')->onDelete('cascade');
        });

        for ($i = 0; $i < 10000; $i++) {
            DB::table('operations')->insert(
                [
                    'sum' => $this->generateSum(),
                    'seller' => $this->generateSeller(),
                    'buyer' => $this->generateBuyer(),
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }

    protected function generateSum()
    {
        return rand(0, 99999);
    }

    protected function generateSeller()
    {
        return rand(1, 100);
    }

    protected function generateBuyer()
    {
        return rand(1, 100);
    }
};
