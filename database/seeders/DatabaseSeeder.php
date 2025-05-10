<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lead;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
        public function run()
        {
            $data = [
                [
                    'nomor' => 'UF25020019',
                    'tanggal' => '2025-02-21',
                    'nama' => 'Customer 25',
                    'nohp' => '082313323221',
                    'alamat' => 'Jalan Raya 1',
                    'kelurahan' => 'KELURAHAN 25',
                    'kecamatan' => 'KECAMATAN 20',
                    'kota' => 'KOTA 3',
                    'tipe' => 'Mobil 9',
                    'warna' => 'MERAH',
                    'hargajual' => 417482811,
                    'discount' => 52400000,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020032',
                    'tanggal' => '2025-02-28',
                    'nama' => 'Customer 33',
                    'nohp' => '082313323222',
                    'alamat' => 'Jalan Raya 2',
                    'kelurahan' => 'KELURAHAN 33',
                    'kecamatan' => 'KECAMATAN 26',
                    'kota' => 'KOTA 7',
                    'tipe' => 'Mobil 11',
                    'warna' => 'MERAH',
                    'hargajual' => 258845594,
                    'discount' => 16396396,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020023',
                    'tanggal' => '2025-02-24',
                    'nama' => 'Customer 30',
                    'nohp' => '082313323223',
                    'alamat' => 'Jalan Raya 3',
                    'kelurahan' => 'KELURAHAN 30',
                    'kecamatan' => 'KECAMATAN 24',
                    'kota' => 'KOTA 6',
                    'tipe' => 'Mobil 12',
                    'warna' => 'MERAH',
                    'hargajual' => 278250233,
                    'discount' => 15000000,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020026',
                    'tanggal' => '2025-02-27',
                    'nama' => 'Customer 10',
                    'nohp' => '082313323224',
                    'alamat' => 'Jalan Raya 4',
                    'kelurahan' => 'KELURAHAN 10',
                    'kecamatan' => 'KECAMATAN 9',
                    'kota' => 'KOTA 7',
                    'tipe' => 'Mobil 12',
                    'warna' => 'MERAH',
                    'hargajual' => 278250233,
                    'discount' => 15000000,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020034',
                    'tanggal' => '2025-02-28',
                    'nama' => 'Customer 29',
                    'nohp' => '082313323225',
                    'alamat' => 'Jalan Raya 5',
                    'kelurahan' => 'KELURAHAN 29',
                    'kecamatan' => 'KECAMATAN 23',
                    'kota' => 'KOTA 5',
                    'tipe' => 'Mobil 1',
                    'warna' => 'HITAM',
                    'hargajual' => 177482576,
                    'discount' => 10000000,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020010',
                    'tanggal' => '2025-02-15',
                    'nama' => 'Customer 13',
                    'nohp' => '082313323226',
                    'alamat' => 'Jalan Raya 6',
                    'kelurahan' => 'KELURAHAN 13',
                    'kecamatan' => 'KECAMATAN 11',
                    'kota' => 'KOTA 6',
                    'tipe' => 'Mobil 1',
                    'warna' => 'HITAM',
                    'hargajual' => 177482576,
                    'discount' => 10000000,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020017',
                    'tanggal' => '2025-02-19',
                    'nama' => 'Customer 1',
                    'nohp' => '082313323227',
                    'alamat' => 'Jalan Raya 7',
                    'kelurahan' => 'KELURAHAN 1',
                    'kecamatan' => 'KECAMATAN 1',
                    'kota' => 'KOTA 8',
                    'tipe' => 'Mobil 1',
                    'warna' => 'HITAM',
                    'hargajual' => 177482576,
                    'discount' => 10000000,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020025',
                    'tanggal' => '2025-02-27',
                    'nama' => 'Customer 5',
                    'nohp' => '082313323228',
                    'alamat' => 'Jalan Raya 8',
                    'kelurahan' => 'KELURAHAN 5',
                    'kecamatan' => 'KECAMATAN 5',
                    'kota' => 'KOTA 6',
                    'tipe' => 'Mobil 3',
                    'warna' => 'HITAM',
                    'hargajual' => 151371878,
                    'discount' => 10000000,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020011',
                    'tanggal' => '2025-02-15',
                    'nama' => 'Customer 3',
                    'nohp' => '082313323229',
                    'alamat' => 'Jalan Raya 9',
                    'kelurahan' => 'KELURAHAN 3',
                    'kecamatan' => 'KECAMATAN 3',
                    'kota' => 'KOTA 2',
                    'tipe' => 'Mobil 4',
                    'warna' => 'HITAM',
                    'hargajual' => 162139094,
                    'discount' => 10000000,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020007',
                    'tanggal' => '2025-02-13',
                    'nama' => 'Customer 27',
                    'nohp' => '082313323230',
                    'alamat' => 'Jalan Raya 10',
                    'kelurahan' => 'KELURAHAN 27',
                    'kecamatan' => 'KECAMATAN 22',
                    'kota' => 'KOTA 3',
                    'tipe' => 'Mobil 4',
                    'warna' => 'HITAM',
                    'hargajual' => 163352944,
                    'discount' => 10000000,
                    'status' => 'Tunai',
                ],
                [
                    'nomor' => 'UF25020016',
                    'tanggal' => '2025-02-19',
                    'nama' => 'Customer 12',
                    'nohp' => '082313323231',
                    'alamat' => 'Jalan Raya 11',
                    'kelurahan' => 'KELURAHAN 12',
                    'kecamatan' => 'KECAMATAN 11',
                    'kota' => 'KOTA 6',
                    'tipe' => 'Mobil 5',
                    'warna' => 'HITAM',
                    'hargajual' => 267521361,
                    'discount' => 59300000,
                    'status' => 'Tunai',
                ],
                // Continue adding more records...
            ];

            // Add all remaining records from the dataset
            $additionalData = [
                [
                    'nomor' => 'UF25020003',
                    'tanggal' => '2025-02-10',
                    'nama' => 'Customer 32',
                    'nohp' => '082313323232',
                    'alamat' => 'Jalan Raya 12',
                    'kelurahan' => 'KELURAHAN 32',
                    'kecamatan' => 'KECAMATAN 25',
                    'kota' => 'KOTA 3',
                    'tipe' => 'Mobil 9',
                    'warna' => 'HITAM',
                    'hargajual' => 333063548,
                    'discount' => 40180181,
                    'status' => 'Tunai',
                ],
                // ... data lainnya, copy sesuai format di atas
            ];
            $this->call(LeadSeeder::class);
        }
    }

