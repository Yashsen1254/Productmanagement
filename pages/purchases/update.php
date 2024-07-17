<?php
require ('../../includes/init.php');

$PurchaseId = $_POST['PurchaseId'];
$purchases = selectOne('SELECT * FROM purchases WHERE PurchaseId = ?', [$PurchaseId]);

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Purchases', $UserId);
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
                    <input id="PurchaseId" type="hidden" value="<?= $purchases['PurchaseId'] ?>">
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
                                <h2 class="text-base font-semibold mb-4">Seller Name</h2>
                                    <input id="SellerName" type="text" class="form-input" placeholder="Seller Name" name="SellerName">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Seller Number</h2>
                                    <input id="SellerNumber" type="number" class="form-input" placeholder="Seller Number" name="SellerNumber">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Seller Address</h2>
                                    <input id="SellerAddress" type="text" class="form-input" placeholder="Seller Address" name="SellerAddress">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Seller City</h2>
                                    <input id="SellerCity" type="text" class="form-input" placeholder="Seller City" name="SellerCity">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Seller State</h2>
                                    <input id="SellerState" type="text" class="form-input" placeholder="Seller State" name="SellerState">
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Date Of Purchase</h2>
                                    <input id="DateOfPurchase" type="date" class="form-input" placeholder="Date Of Purchase" name="DateOfPurchase">
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

        var PurchaseId = $("#PurchaseId").val();
        var ProductId = $("#ProductId").val();
        var ItemPrice = $("#ItemPrice").val();
        var SellerName = $("#SellerName").val();
        var SellerNumber = $("#SellerNumber").val();
        var SellerAddress = $("#SellerAddress").val();
        var SellerCity = $("#SellerCity").val();
        var SellerState = $("#SellerState").val();
        var DateOfPurchase = $("#DateOfPurchase").val();
        var TotalPrice = $("#TotalPrice").val();

        $.ajax({
            url: "../../api/purchases/update.php",
            method: "POST",
            data: {
                PurchaseId : PurchaseId,
                ProductId : ProductId,
                ItemPrice : ItemPrice,
                SellerName : SellerName,
                SellerNumber : SellerNumber,
                SellerAddress : SellerAddress,
                SellerCity : SellerCity,
                SellerState : SellerState,
                DateOfPurchase : DateOfPurchase,
                TotalPrice : TotalPrice
            },
            success: function (response) {
                console.log(response.success);
                alert("Purchases Added");
                window.location.href = './index.php';
            }
        })
    }
</script>
<?php
    include pathOf('includes/pageend.php');
?>