<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    // role e kudu Super Admin biar bisa akses semua menu hehegpp
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => 'name-' . $i,
                // 'role' => 'role-' . $i,
                // 'status' => 'status-' . $i,
                'nip' => '000' . $i,
                // wait, itu 00 knfh? string oo
                'telepon' => 'telepon-' . $i,
                'email' => 'email_' . $i . '@gmail.com',
                'password' => Hash::make('password'),
            ]);

            $data = Pegawai::create([
                // 'idUser' => auth()->id(),
                'nip' => $user->nip,
                'noKtp' => "noKtp-" . $i,
                'nama' => "nama-" . $i,
                'tglLahir' => now(),
                'jenisKelamin' => "Perempuan",
                'statusPerkawinan' => "Menikah",
                'telepon' => "telepon-" . $i,
                'alamat' => "alamat-" . $i,
                'tglMasuk' => now(),
                'penempatan' => "penempatan-" . $i,
                'jabatan' => "jabatan-" . $i,
                'kantor'     => "kantor-" . $i,
                'statusPegawai' => "statusPegawai-" . $i,
                'rekeningTabungan' => "rekeningTabungan-" . $i,
            ]);
        }
    }
}
