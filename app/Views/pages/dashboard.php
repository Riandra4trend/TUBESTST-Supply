<!-- application/Views/history.php -->
<div class="ml-72  min-h-screen bg-[#EDF2F7]">
    <div class="pl-12 py-4">
        <p class="text-4xl font-bold text-gray-800 py-4">
            dashboard
        </p>
        <p class="text-xs font-thin text-gray-500">
            dashboard / overview
        </p>
    </div>
    <div class="px-12 pt-2">
        <div class="flex justify-between">
            <div class="relative inline-block text-left">
                <!-- Add your filter dropdown content here -->
            </div>
        </div>

        <table class="table-auto w-full mt-4 rounded-2xl overflow-hidden bg-[#F3F3F3]">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr>
                    <th class="text-center py-4">Cabang</th>
                    <th class="text-center py-4">Alamat</th>
                    <th class="text-center py-4">order Details</th>
                    <th class="text-center py-4">total price</th>
                    <th class="text-center py-4">Status Pembayaran</th>
                    <th class="text-center py-4">Status Pesanan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $index => $item) : ?>
                    <?php
                    $backgroundColorClass = $index % 2 === 0 ? 'bg-[#F3F3F3]' : 'bg-[#FDFDFD]';
                    ?>
                    <?php


                    // disini buatkan array order details sesuai dengan item["id_supply"] array 
                    // tampilkan hasil total price total dari perkalian harga dan jumlah serta keseluruhan produk
                    // buat array yang berisi nama_cabang dan alamatnya
                    ?>
                    <tr class="rounded-lg <?= $backgroundColorClass ?> border-b-2 border-gray-200">
                    
                        <td class="text-center py-4"><?= $item['nama_cabang']?></td>
                        <td class="text-center py-4"><?= $item['alamat']?></td>
                        <td class="text-center py-4"><?= $item['nama']?></td>
                        <td class="text-center py-4"><?= $item['harga']?></td>
                        <td class="text-center py-4"><?= $item['status_pembayaran']?></td>
                        <td class="text-center py-4"><?= $item['status_pengiriman']?></td>
                        <td class="text-center py-4">
                        <button class="text-center px-4 py-1 bg-[#70CC40] hover:bg-[#70CC90] rounded-lg text-black text-sm font-bold" type="submit">
                            Confirm
                        </button>
                        </td>
                        <td class="text-center py-4">
                        <button class="text-center px-4 py-1 bg-[#FF0000] hover:bg-red-900 rounded-lg text-black text-sm font-bold" type="submit">
                            Cancel
                        </button>
                        </td>
                        

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>

</div>