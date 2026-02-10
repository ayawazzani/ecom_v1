<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لإجراء هذا الطلب.
     */
    public function authorize(): bool
    {
        // يجب أن تكون true لكي يسمح النظام بإرسال البيانات من الفورم
        return true; 
    }

    /**
     * قواعد التحقق التي سيتم تطبيقها على الطلب.
     */
    public function rules()
{
    return [
        'titre'       => 'required|string|max:255',
        'contenu'     => 'required|string',
        'prix'        => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
}


    /**
     * تخصيص رسائل الخطأ باللغة العربية.
     */
    public function messages(): array
{
    return [
        'titre.required'       => 'Le nom du produit est obligatoire.',
        'titre.min'            => 'Le nom du produit doit contenir au moins 5 caractères.',
        'prix.required'        => 'Veuillez préciser le prix du produit.',
        'prix.numeric'         => 'Le prix doit être un nombre.',
        'category_id.required' => 'Veuillez choisir une catégorie.',
        'image.required'       => 'Une image est requise pour ce produit.',
        'image.image'          => 'Le fichier doit être une image (jpeg, png, etc.).',
        'image.max'            => 'L\'image est trop lourde (maximum 2 Mo).',
        'contenu.required'     => 'La description du produit est obligatoire.',
        'contenu.min'          => 'La description doit contenir au moins 10 caractères.',
    ];
}
}