<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Order::select('users.name as user_name', 'users.email as user_email', 'order_code', 'total_price', 'status')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->get();
    }


    /**
     * Excel Table Header Row
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'User Name',
            'User Email',
            'Order Code',
            'Total Price',
            'Status'
        ];
    }

    /**
     * Map the data for export.
     *
     * @param mixed $order
     * @return array
     */
    public function map($order): array
    {
        return [
            $order->user_name,
            $order->user_email,
            $order->order_code,
            $order->total_price,
            $order->status
        ];
    }
}
