<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationRequest extends Model
{
    use HasFactory;

    protected $table = 'quotation_requests';

    protected $fillable = [
        'product_id',
        'name',
        'category',
        'company_name',
        'industry',
        'contact_number',
        'email',
        'request_date',
        'message',
        'status',
        'admin_email_sent',
        'customer_email_sent',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'request_date' => 'date',
        'admin_email_sent' => 'boolean',
        'customer_email_sent' => 'boolean',
    ];
}
