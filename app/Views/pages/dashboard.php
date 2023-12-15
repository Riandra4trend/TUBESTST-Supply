<!-- application/Views/history.php -->
<div class="pl-72">

    <div class="bg-[#EDF2F7] px-12 pt-2 min-h-screen">
        <div class="flex justify-between">
            <div class="relative inline-block text-left">
                <button class="rounded-md px-2 py-2 bg-[#BADAEA] text-black focus:outline-none hover:bg-[#A4D4E5]">
                    <!-- Add your filter icon here -->
                </button>
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
                        use App\Models\OrderModel;
                        $orderModel = model(OrderModel::class);
                        $oderdetails = $orderModel->getOrderDetails($item['id_supply']);
                        $totalPrice = $orderModel->getTotalPrice($item['id_supply']);
                        
                    ?>
                    <tr class="rounded-lg <?= $backgroundColorClass ?> border-b-2 border-gray-200">
                        <td class="text-center py-4"><?= $item['nama_cabang'] ?></td>
                        <td class="text-center py-4"><?= $item['alamat'] ?></td>
                        <td class="text-center py-4"><?= $oderdetails?></td>
                        <td class="text-center py-4"><?= $totalPrice?></td>
                        <td class="text-center py-4"><?= $item['status_pembayaran'] ?></td>
                        <td class="text-center py-4"><?= $item['status_pengiriman'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        
    </div>
    
</div>
