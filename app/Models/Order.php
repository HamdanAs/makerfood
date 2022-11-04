<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function kitchen(): BelongsTo
    {
        return $this->belongsTo(Kitchen::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function statusText(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            switch ($attributes['status']) {
                case 1:
                    return "Menunggu Konfirmasi";
                case 2:
                    return "Sudah Dikonfirmasi";
                case 3:
                    return "Sedang Diantar";
                case 4:
                    return "Siap Diambil";
                case 5:
                    return "Selesai";
                case 6:
                    return "Pesanan Batal";
                default:
                    return "Status Tidak Diketahui";
            }
        });
    }

    public function paymentMethodText(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            switch ($attributes['payment_method']) {
                case 1:
                    return "Cash On Delivery";
                case 2:
                    return "Transfer";
                default:
                    return "Pembayaran Invalid";
            }
        });
    }

    public function deliveryMethodText(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            switch ($attributes['delivery_method']) {
                case 1:
                    return "Kirim";
                case 2:
                    return "Ambil";
                default:
                    return "Invalid";
            }
        });
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function (Order $order) {
            //get last record
            $record = Order::latest()->first();

            if ($record == null || $record == "") {
                if (date('l', strtotime(date('Y-01-01')))) {
                    $nextInvoiceNumber = 'Pesanan/' . date('Y') . '/00001';
                }
            } else {
                $expNum = explode('/', $record->ref);
                $number = ($expNum[2] + 1);
                $nextInvoiceNumber = 'Pesanan' . '/' .$expNum[1] . '/' . str_pad($number, 5, '0', STR_PAD_LEFT);
            }

            $order->ref = $nextInvoiceNumber;
        });
    }
}
