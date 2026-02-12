<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Esta variable detecta si la petición es una actualización
        // PUT o PATCH se usan para actualizar recursos en Laravel
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');

        // Retornamos un array con las reglas de validación
        return [

            // Campo "name":
            // Si es UPDATE → a veces viene (sometimes), debe ser string y máximo 255 caracteres
            // Si es CREATE → es obligatorio (required), string y máximo 255 caracteres
            'name' => $isUpdate
                ? 'sometimes|string|max:255'
                : 'required|string|max:255',

            // Campo "description":
            // Es opcional (nullable) y debe ser texto (string)
            'description' => 'nullable|string',

            // Campo "price":
            // Si es UPDATE → a veces viene, debe ser numérico y mínimo 0
            // Si es CREATE → obligatorio, numérico y mínimo 0
            'price' => $isUpdate
                ? 'sometimes|numeric|min:0'
                : 'required|numeric|min:0',

            // Campo "stock":
            // Si es UPDATE → a veces viene, debe ser entero y mínimo 0
            // Si es CREATE → obligatorio, entero y mínimo 0
            'stock' => $isUpdate
                ? 'sometimes|integer|min:0'
                : 'required|integer|min:0',
        ];
    }


    public function messages(): array
    {
        // Este método sirve para PERSONALIZAR los mensajes de error
        // que Laravel muestra cuando una validación falla.
        //
        // En vez de mostrar mensajes genéricos en inglés,
        // tú defines aquí mensajes más claros en español.

        return [

            // Si el campo "name" no se envía y es obligatorio
            'name.required' => 'El nombre del producto es obligatorio.',

            // Si el campo "name" no es texto (string)
            'name.string' => 'El nombre del producto debe ser una cadena de texto.',

            // Si el campo "name" supera los 255 caracteres
            'name.max' => 'El nombre del producto no puede exceder los 255 caracteres.',

            // Si se envía "description" pero no es texto
            // (recordemos que description puede ser nullable)
            'description.string' => 'La descripción del producto debe ser una cadena de texto.',

            // Si el campo "price" no se envía y es obligatorio
            'price.required' => 'El precio del producto es obligatorio.',

            // Si el campo "price" no es un número válido
            'price.numeric' => 'El precio del producto debe ser un número.',

            // Si el campo "price" es menor que 0
            // (Laravel no permite precios negativos)
            'price.min' => 'El precio del producto no puede ser negativo.',

            // Si el campo "stock" no se envía y es obligatorio
            'stock.required' => 'La cantidad en stock es obligatoria.',

            // Si el campo "stock" no es un número entero
            'stock.integer' => 'La cantidad en stock debe ser un número entero.',

            // Si el campo "stock" es menor que 0
            // (no puede existir stock negativo)
            'stock.min' => 'La cantidad en stock no puede ser negativa.',
        ];
    }


}
