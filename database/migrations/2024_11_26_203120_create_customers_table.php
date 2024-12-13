<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->integer('birthMonth')->nullable();
            $table->integer('birthDay')->nullable();
            $table->boolean('physicalMailing')->default(false);
            $table->boolean('digitalMailing')->default(false);
            $table->boolean('loyaltyEnrollment')->default(false);
            $table->timestamps();
        });

        // Insert sample data
        $customers = [
            [
                'firstName' => 'John', 'lastName' => 'Smith', 'email' => 'john.smith@example.com',
                'company' => 'Tech Corp', 'phone' => '555-0101', 'mobile' => '555-0102',
                'address' => '123 Main St', 'city' => 'Austin', 'state' => 'TX', 'zipcode' => '78701',
                'birthMonth' => 3, 'birthDay' => 15, 'physicalMailing' => true, 'digitalMailing' => true, 'loyaltyEnrollment' => true
            ],
            [
                'firstName' => 'Jane', 'lastName' => 'Smith', 'email' => 'jane.smith@example.com',
                'company' => 'Design Co', 'phone' => '555-0103', 'mobile' => '555-0104',
                'address' => '456 Oak Ave', 'city' => 'Portland', 'state' => 'OR', 'zipcode' => '97201',
                'birthMonth' => 6, 'birthDay' => 22, 'physicalMailing' => false, 'digitalMailing' => true, 'loyaltyEnrollment' => true
            ],
            [
                'firstName' => 'Robert', 'lastName' => 'Smith', 'email' => 'robert.smith@example.com',
                'company' => 'Marketing Pro', 'phone' => '555-0105', 'mobile' => '555-0106',
                'address' => '789 Pine Rd', 'city' => 'Seattle', 'state' => 'WA', 'zipcode' => '98101',
                'birthMonth' => 9, 'birthDay' => 8, 'physicalMailing' => true, 'digitalMailing' => false, 'loyaltyEnrollment' => true
            ],
            [
                'firstName' => 'Maria', 'lastName' => 'Smith', 'email' => 'maria.smith@example.com',
                'company' => 'Creative LLC', 'phone' => '555-0107', 'mobile' => '555-0108',
                'address' => '321 Elm St', 'city' => 'Miami', 'state' => 'FL', 'zipcode' => '33101',
                'birthMonth' => 12, 'birthDay' => 1, 'physicalMailing' => true, 'digitalMailing' => true, 'loyaltyEnrollment' => false
            ],
            [
                'firstName' => 'William', 'lastName' => 'Smith', 'email' => 'will.smith@example.com',
                'company' => 'Smith Industries', 'phone' => '555-0109', 'mobile' => '555-0110',
                'address' => '741 Maple Dr', 'city' => 'Chicago', 'state' => 'IL', 'zipcode' => '60601',
                'birthMonth' => 4, 'birthDay' => 30, 'physicalMailing' => false, 'digitalMailing' => false, 'loyaltyEnrollment' => true
            ],
            [
                'firstName' => 'Sarah', 'lastName' => 'Smith', 'email' => 'sarah.smith@example.com',
                'company' => 'Smith & Co', 'phone' => '555-0111', 'mobile' => '555-0112',
                'address' => '852 Cedar Ln', 'city' => 'Denver', 'state' => 'CO', 'zipcode' => '80201',
                'birthMonth' => 7, 'birthDay' => 17, 'physicalMailing' => true, 'digitalMailing' => true, 'loyaltyEnrollment' => true
            ],
            [
                'firstName' => 'Michael', 'lastName' => 'Smith', 'email' => 'mike.smith@example.com',
                'company' => 'Smith Tech', 'phone' => '555-0113', 'mobile' => '555-0114',
                'address' => '963 Birch St', 'city' => 'Boston', 'state' => 'MA', 'zipcode' => '02101',
                'birthMonth' => 1, 'birthDay' => 5, 'physicalMailing' => false, 'digitalMailing' => true, 'loyaltyEnrollment' => false
            ],
            [
                'firstName' => 'Lisa', 'lastName' => 'Smith', 'email' => 'lisa.smith@example.com',
                'company' => 'Smith Arts', 'phone' => '555-0115', 'mobile' => '555-0116',
                'address' => '159 Walnut Ave', 'city' => 'San Francisco', 'state' => 'CA', 'zipcode' => '94101',
                'birthMonth' => 11, 'birthDay' => 11, 'physicalMailing' => true, 'digitalMailing' => false, 'loyaltyEnrollment' => true
            ],
            [
                'firstName' => 'David', 'lastName' => 'Smith', 'email' => 'david.smith@example.com',
                'company' => 'Smith Media', 'phone' => '555-0117', 'mobile' => '555-0118',
                'address' => '357 Spruce Ct', 'city' => 'Phoenix', 'state' => 'AZ', 'zipcode' => '85001',
                'birthMonth' => 8, 'birthDay' => 25, 'physicalMailing' => true, 'digitalMailing' => true, 'loyaltyEnrollment' => true
            ],
            [
                'firstName' => 'Emily', 'lastName' => 'Smith', 'email' => 'emily.smith@example.com',
                'company' => 'Smith Enterprises', 'phone' => '555-0119', 'mobile' => '555-0120',
                'address' => '753 Oak St', 'city' => 'Las Vegas', 'state' => 'NV', 'zipcode' => '89101',
                'birthMonth' => 5, 'birthDay' => 19, 'physicalMailing' => false, 'digitalMailing' => true, 'loyaltyEnrollment' => true
            ]
        ];

        foreach ($customers as $customer) {
            DB::table('customers')->insert(array_merge($customer, [
                'created_at' => now(),
                'updated_at' => now()
            ]));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
