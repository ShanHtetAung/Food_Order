<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class OrderImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * Change Attribute Name to Have User-friendly Error Message
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'user_email' => 'User Email'
        ];
    }

    /**
     * Import Excel Data
     *
     * @param array $row
     * @return mixed
     */
    public function model(array $row): mixed
    {
        // Check if both "User Email" and "User Name" columns are not empty
        if (!empty($row['user_email']) && !empty($row['user_name'])) {
            // Check if the User exists in the User table
            $user = User::where('email', $row['user_email'])
                ->where('name', $row['user_name'])
                ->first();

            if (!$user) {
                // User does not exist, throw an exception to stop importing this file
                throw new \Exception("For '{$row['user_email']}', both user name and email must be valid.");
            }

            // Initialize default order data with user_id
            $orderData = [
                'order_code' => $row['order_code'],
                'total_price' => $row['total_price'],
                'status' => $row['status'],
                'user_id' => $user->id,
            ];
            return new Order($orderData);
        }

        return null; // Return null to skip importing this row if "User Email" or "User Name" is empty
    }

    /**
     * Order Validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255', // Use 'user_email' instead of 'user'
            'order_code' => 'required|string|max:255',
            'total_price' => 'required|numeric|digits_between:2,4',
            'status' => 'required|string|max:100'
        ];
    }
}
