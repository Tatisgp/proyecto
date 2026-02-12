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
        // Schema::create significa: "Crear una nueva tabla"
        // En este caso la tabla se llamará "products"
        Schema::create('products', function (Blueprint $table) {

            // Crea la columna "id" como clave primaria
            // Es autoincremental (1,2,3...)
            $table->id();

            // Crea una columna llamada "name"
            // Tipo string = VARCHAR(255)
            // Guarda el nombre del producto
            $table->string('name');

            // Crea una columna llamada "description"
            // Tipo text = texto largo
            // nullable() permite que esté vacía
            $table->text('description')->nullable();

            // Crea una columna llamada "price"
            // Tipo decimal con 8 dígitos y 2 decimales
            // Ejemplo: 999999.99
            $table->decimal('price', 8, 2);

            // Crea una columna llamada "stock"
            // Tipo integer = número entero
            // default(0) significa que empieza en 0 si no se da valor
            $table->integer('stock')->default(0);

            // Crea automáticamente:
            // created_at y updated_at
            // para guardar fechas de creación y actualización
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
