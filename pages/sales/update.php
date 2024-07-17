<?php
require ('../../includes/init.php');

$SalesId = $_POST['SalesId'];
$sales = selectOne('SELECT * FROM sales WHERE SalesId = ?', [$SalesId]);

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Sales', $UserId);
if ($permissions['EditPermission'] != 1)
    header('Location: ./index.php');

$products = select("SELECT * FROM Products");

include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
include pathOf('includes/navbar.php');

?>


<body x-data="main" class="font-inter text-base antialiased font-medium relative vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">
    <!-- Start Layout -->
    <div class="bg-white dark:bg-dark text-dark dark:text-white">
        <!-- Start Menu Sidebar Olverlay -->
        <div x-cloak class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-40 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
        <!-- End Menu Sidebar Olverlay -->

        <!-- Start Main Content -->
        <div class="main-container flex mx-auto">
            <!-- Start Content Area -->
            <div class="main-content flex-1">
                <!-- Start Content -->
                <div class="h-[calc(100vh-60px)] relative overflow-y-auto overflow-x-hidden p-5 sm:p-7 space-y-5">
                    <!-- Start All Card -->
                    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
                    <input id="SalesId" type="hidden" value="<?= $sales['SalesId'] ?>">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Product Name</h2>
                                <form>
                                    <select id="ProductId" class="form-select">
                                        <?php foreach ($products as $product) :?>
                                        <option value="<?= $product['ProductId'] ?>"><?= $product['Name'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </form>
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Item Price</h2>
                                    <input id="ItemPrice" type="number" class="form-input" placeholder="ItemPrice" name="ItemPrice">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Buyer Name</h2>
                                    <input id="BuyerName" type="text" class="form-input" placeholder="Buyer Name" name="BuyerName">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Buyer Number</h2>
                                    <input id="BuyerNumber" type="number" class="form-input" placeholder="Buyer Number" name="BuyerNumber">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Buyer Address</h2>
                                    <input id="BuyerAddress" type="text" class="form-input" placeholder="Buyer Address" name="BuyerAddress">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Buyer City</h2>
                                    <input id="BuyerCity" type="text" class="form-input" placeholder="Buyer City" name="BuyerCity">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Buyer State</h2>
                                    <input id="BuyerState" type="text" class="form-input" placeholder="Buyer State" name="BuyerState">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Date Of Sales</h2>
                                    <input id="DateOfSales" type="date" class="form-input" placeholder="Date Of Sales" name="DateOfSales">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Total Price</h2>
                                    <input id="TotalPrice" type="text" class="form-input" placeholder="Total Price" name="TotalPrice" disabled>
                            </div>
                        </div>
                        <button type="submit" onclick="sendData()" class="btn border text-success border-success rounded-md transition-all duration-300 hover:bg-success hover:text-white">Success</button>
                    </div>
                    <!-- End All Card --> 
<?php
    include pathOf('includes/scripts.php');
?>
<script>

    function sendData() {   

        var SalesId = $("#SalesId").val();
        var ProductId = $("#ProductId").val();
        var ItemPrice = $("#ItemPrice").val();
        var BuyerName = $("#BuyerName").val();
        var BuyerNumber = $("#BuyerNumber").val();
        var BuyerAddress = $("#BuyerAddress").val();
        var BuyerCity = $("#BuyerCity").val();
        var BuyerState = $("#BuyerState").val();
        var DateOfSales = $("#DateOfSales").val();
        var TotalPrice = $("#TotalPrice").val();

        $.ajax({
            url: "../../api/sales/update.php",
            method: "POST",
            data: {
                SalesId : SalesId,
                ProductId : ProductId,
                ItemPrice : ItemPrice,
                BuyerName : BuyerName,
                BuyerNumber : BuyerNumber,
                BuyerAddress : BuyerAddress,
                BuyerCity : BuyerCity,
                BuyerState : BuyerState,
                DateOfSales : DateOfSales,
                TotalPrice : TotalPrice
            },
            success: function (response) {
                console.log(response.success);
                alert("Sales Updated");
                window.location.href = './index.php';
            }
        })
    }
</script>
<?php
    include pathOf('includes/pageend.php');
?>