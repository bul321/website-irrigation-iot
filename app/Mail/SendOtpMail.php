<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $userName;

    public function __construct($otp, $userName)
    {
        $this->otp = $otp;
        $this->userName = $userName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Kode OTP Verifikasi - Smart Irrigation',
        );
    }

    public function content(): Content
    {
        return new Content(
            htmlString: "
                <div style='font-family: sans-serif; padding: 20px; max-width: 500px; margin: auto; border: 1px solid #eee; rounded: 12px;'>
                    <h2 style='color: #059669; text-align: center;'>🌱 Smart Irrigation System</h2>
                    <p>Halo <strong>{$this->userName}</strong>,</p>
                    <p>Berikut adalah kode OTP keamanan lo untuk mengaktifkan akun aplikasi monitoring irigasi lahan:</p>
                    <div style='text-align: center; margin: 30px 0;'>
                        <span style='font-size: 32px; font-weight: bold; letter-spacing: 5px; background: #f3f4f6; padding: 10px 20px; border-radius: 8px; color: #1f2937;'>
                            {$this->otp}
                        </span>
                    </div>
                    <p style='color: #6b7280; font-size: 13px; text-align: center;'>Kode ini hanya berlaku selama <strong>5 menit</strong>. Jangan bagikan kode ini kepada siapa pun, termasuk tim kami.</p>
                </div>
            ",
        );
    }
}