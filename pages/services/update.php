<?php
require ('../../includes/init.php');

$ServiceId = $_POST['ServiceId'];
$services = selectOne('SELECT * FROM services WHERE ServiceId = ?', [$ServiceId]);

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Services', $UserId);
if ($permissions['EditPermission'] != 1)
    header('Location: ./index.php');

$products = select('SELECT * FROM products');

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
                    <input id="ServiceId" type="hidden" value="<?= $services['ServiceId'] ?>">
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
                                <h2 class="text-base font-semibold mb-4">Buyer Name</h2>
                                <form class="space-y-4">
                                    <input id="BuyerName" type="text" name="BuyerName" class="form-input" placeholder="BuyerName" value="<?= $services['BuyerName'] ?>">
                                </form>
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Buyer Number</h2>
                                <form class="space-y-4">
                                    <input id="BuyerNumber" type="number" name="BuyerNumber" class="form-input" placeholder="BuyerNumber" value="<?= $services['BuyerNumber'] ?>">
                                </form>
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Buyer Address</h2>
                                <form class="space-y-4">
                                    <input id="BuyerAddress" type="text" name="BuyerAddress" class="form-input" placeholder="BuyerAddress" value="<?= $services['BuyerAddress'] ?>">
                                </form>
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Buyer City</h2>
                                <form class="space-y-4">
                                    <input id="BuyerCity" type="text" name="BuyerCity" class="form-input" placeholder="BuyerCity" value="<?= $services['BuyerCity'] ?>">
                                </form>
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Buyer State</h2>
                                <form class="space-y-4">
                                    <input id="BuyerState" type="text" name="BuyerState" class="form-input" placeholder="BuyerState" value="<?= $services['BuyerState'] ?>">
                                </form>
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">To Date</h2>
                                <form class="space-y-4">
                                    <input id="ToDate" type="date" name="ToDate" class="form-input" placeholder="ToDate" value="<?= $services['ToDate'] ?>">
                                </form>
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">From Date</h2>
                                <form class="space-y-4">
                                    <input id="FromDate" type="date" name="FromDate" class="form-input" placeholder="FromDate" value="<?= $services['FromDate'] ?>">
                                </form>
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Price</h2>
                                <form class="space-y-4">
                                    <input id="Price" type="number" name="Price" class="form-input" placeholder="Price" value="<?= $services['Price'] ?>">
                                </form>
                            </div>
                        </div>
                        <button type="button" onclick="sendData()" class="btn border text-success border-success rounded-md transition-all duration-300 hover:bg-success hover:text-white">Submit</button>
                    </div>
                    <!-- End All Card -->


<?php
    include pathOf('includes/scripts.php');
    ?>
    <script>
    function sendData() {
    
        var ServiceId = $("#ServiceId").val();
        var ProductId = $("#ProductId").val();
        var BuyerName = $("#BuyerName").val();
        var BuyerNumber = $("#BuyerNumber").val();
        var BuyerAddress = $("#BuyerAddress").val();
        var BuyerCity = $("#BuyerCity").val();
        var BuyerState = $("#BuyerState").val();
        var ToDate = $("#ToDate").val();
        var FromDate = $("#FromDate").val();
        var Price = $("#Price").val();
    
        $.ajax({
            url: "../../api/services/update.php",
            method: "POST",
            data: {
                ServiceId : ServiceId,
                ProductId : ProductId,
                BuyerName : BuyerName,
                BuyerNumber : BuyerNumber,
                BuyerAddress : BuyerAddress,
                BuyerCity : BuyerCity,
                BuyerState : BuyerState,
                ToDate : ToDate,
                FromDate : FromDate,
                Price : Price,
            },
            success: function (response) {
                alert("Services Added");
                window.location.href = './index.php';
            }
        })
    }
    </script>
<?php
    include pathOf('includes/pageend.php');
?>
