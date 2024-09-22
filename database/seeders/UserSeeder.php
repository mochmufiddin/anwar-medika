<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create roles for doctor and pharmacist
        $doctorRole = Role::firstOrCreate(['name' => 'doctor']);
        $pharmacistRole = Role::firstOrCreate(['name' => 'pharmacist']);

        // Create 2 doctor accounts
        $doctor1 = User::create([
            'name' => 'Dr. Rizal',
            'email' => 'rizal@anwarmedika.com',
            'password' => Hash::make('CacingBercula1'), 
            'role' => 'doctor',
            'license_number' => 'D001',
            'specialization' => 'General Practitioner',
        ]);
        $doctor1->assignRole($doctorRole);

        $doctor2 = User::create([
            'name' => 'Dr. Siti',
            'email' => 'siti@anwarmedika.com',
            'password' => Hash::make('CacingBercula1'), 
            'role' => 'doctor',
            'license_number' => 'D002',
            'specialization' => 'Pediatrician',
        ]);
        $doctor2->assignRole($doctorRole);

        // Create 2 pharmacist accounts
        $pharmacist1 = User::create([
            'name' => 'Apt. Rudi',
            'email' => 'rudi@anwarmedika.com',
            'password' => Hash::make('CacingBercula1'), 
            'role' => 'pharmacist',
        ]);
        $pharmacist1->assignRole($pharmacistRole);

        $pharmacist2 = User::create([
            'name' => 'Apt. Tuti',
            'email' => 'tuti@anwarmedika.com',
            'password' => Hash::make('CacingBercula1'), 
            'role' => 'pharmacist',
        ]);
        $pharmacist2->assignRole($pharmacistRole);
    }
}
