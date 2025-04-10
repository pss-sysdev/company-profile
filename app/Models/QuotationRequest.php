<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationRequest extends Model
{
    use HasFactory;

    protected $table = 'quatation_request';

    protected $fillable = [
        'name',
        'your_category',
        'request',
        'company_name',
        'industry',
        'phone_number',
        'email',
        'messages',
        'product_id',
        'request_appointment',
        'category',
    ];
}
