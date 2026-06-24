<?php

namespace App\Http\Controllers;

use App\Models\QuotationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Brand - Perintis Sukses Sejahtera';
        $brand = DB::table('brand')->get();

        return view('frontend.pages.contact_us.index', [
            'type_menu'       => 'contact_us',
            'product_id'      => $request->product_id,
            'title'           => $title,
            'brand'           => $brand,
            'categoryOnBrand' => categoryOnBrand(),
            'categorys'        => category(),
        ]);
    }

    public function create(Request $request)
    {
        if ($request->filled('website')) {
            Log::warning('Quotation request blocked by honeypot.', [
                'ip' => $request->ip(),
                'user_agent' => Str::limit((string) $request->userAgent(), 255, ''),
            ]);

            return redirect()
                ->route('contact_us')
                ->with('success', 'Your appointment / quotation request has been received. Our team will contact you shortly.');
        }

        $validated = $request->validate([
            'product_id' => ['nullable', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'request_date' => ['required', 'date'],
            'company_name' => ['required', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ], [
            'request_date.required' => 'The requested appointment / quotation date is required.',
            'request_date.date' => 'The requested appointment / quotation date must be a valid date.',
            'contact_number.required' => 'The contact number field is required.',
        ]);

        $quotationRequest = QuotationRequest::create([
            'product_id' => $validated['product_id'] ?? null,
            'name' => $this->cleanText($validated['name']),
            'category' => $this->cleanText($validated['category']),
            'request_date' => $validated['request_date'],
            'company_name' => $this->cleanText($validated['company_name']),
            'industry' => $this->cleanText($validated['industry'] ?? ''),
            'contact_number' => $this->cleanText($validated['contact_number']),
            'email' => strtolower($this->cleanText($validated['email'])),
            'message' => trim(strip_tags($validated['message'])),
            'status' => 'new',
            'ip_address' => $request->ip(),
            'user_agent' => Str::limit((string) $request->userAgent(), 500, ''),
        ]);

        $this->sendQuotationEmails($quotationRequest);

        return redirect()
            ->route('contact_us')
            ->with('success', 'Your appointment / quotation request has been received. Our team will contact you shortly.');
    }

    private function sendQuotationEmails(QuotationRequest $quotationRequest): void
    {
        $adminEmail = config('services.quotation.admin_email', 'sales@domain.com');
        $companyPhone = config('services.quotation.company_phone', 'COMPANY_PHONE_HERE');

        try {
            Mail::raw($this->adminEmailBody($quotationRequest), function ($message) use ($quotationRequest, $adminEmail) {
                $message
                    ->to($adminEmail)
                    ->replyTo($quotationRequest->email, $quotationRequest->name)
                    ->subject('New Appointment / Quotation Request - ' . $quotationRequest->company_name);
            });

            $quotationRequest->forceFill(['admin_email_sent' => true])->save();
        } catch (\Throwable $exception) {
            Log::error('Failed to send quotation admin email.', [
                'quotation_request_id' => $quotationRequest->id,
                'exception' => get_class($exception),
                'message' => $exception->getMessage(),
            ]);
        }

        try {
            Mail::raw($this->customerEmailBody($quotationRequest, $adminEmail, $companyPhone), function ($message) use ($quotationRequest, $adminEmail) {
                $message
                    ->to($quotationRequest->email, $quotationRequest->name)
                    ->replyTo($adminEmail)
                    ->subject('Your Appointment / Quotation Request Has Been Received');
            });

            $quotationRequest->forceFill(['customer_email_sent' => true])->save();
        } catch (\Throwable $exception) {
            Log::error('Failed to send quotation customer email.', [
                'quotation_request_id' => $quotationRequest->id,
                'exception' => get_class($exception),
                'message' => $exception->getMessage(),
            ]);
        }
    }

    private function adminEmailBody(QuotationRequest $quotationRequest): string
    {
        return <<<TEXT
New Appointment / Quotation Request

A new appointment / quotation request has been submitted from the website.

Customer Information
Name              : {$quotationRequest->name}
Category          : {$quotationRequest->category}
Company Name      : {$quotationRequest->company_name}
Industry          : {$quotationRequest->industry}
Contact Number    : {$quotationRequest->contact_number}
Email Address     : {$quotationRequest->email}
Requested Date    : {$quotationRequest->request_date->format('Y-m-d')}

Message
{$quotationRequest->message}

Recommended Follow-up
Please contact the customer via phone, WhatsApp, or email.

--
This email was sent automatically from the website form.
TEXT;
    }

    private function customerEmailBody(QuotationRequest $quotationRequest, string $adminEmail, string $companyPhone): string
    {
        return <<<TEXT
Dear {$quotationRequest->name},

Thank you for contacting PT. Perintis Sukses Sejahtera.

We have received your appointment / quotation request with the following details:

Category       : {$quotationRequest->category}
Company Name   : {$quotationRequest->company_name}
Industry       : {$quotationRequest->industry}
Requested Date : {$quotationRequest->request_date->format('Y-m-d')}
Message        : {$quotationRequest->message}

Our team will review your request and contact you shortly.

Best regards,

PT. Perintis Sukses Sejahtera
Sales & Partnership Team
Email: {$adminEmail}
Phone: {$companyPhone}
TEXT;
    }

    private function cleanText(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return trim(strip_tags($value));
    }
}
