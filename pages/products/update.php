<?php
require ('../../includes/init.php');

$ProductId = $_POST["ProductId"];
$products = selectOne("SELECT * FROM Products WHERE ProductId = ?", [$ProductId]);

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Products', $UserId);
if ($permissions['AddPermission'] != 1)
    header('Location: ./index.php');

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
                    <input id="ProductId" name="ProductId" type="hidden" value="<?= $products['ProductId'] ?>">
                    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Name</h2>
                                <form class="space-y-4">
                                    <input id="Name" name="Name" type="text" class="form-input" placeholder="Name" autofocus value="<?= $products['Name'] ?>">
                                </form>
                            </div>
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Price</h2>
                                <form class="space-y-4">
                                    <input id="Price" name="Price" type="number" class="form-input" placeholder="Price" value="<?= $products['Price'] ?>">
                                </form>
                            </div>
                        </div>
                        <button type="submit" onclick="sendData()" class="btn border text-success border-success rounded-md transition-all duration-300 hover:bg-success hover:text-white">Success</button>
                    </div>
<?php
    include pathOf('includes/scripts.php');
?>
<script>
function sendData() {

    var ProductId = $("#ProductId").val();
    var Name = $("#Name").val();
    var Price = $("#Price").val();
    $.ajax({
        url: "../../api/products/update.php",
        method: "POST",
        data: {
            ProductId : ProductId,
            Name : Name,
            Price : Price
        },
        success: function (response) {
            console.log(response.success);
            alert("Product Updated");
            window.location.href = './index.php';
        }
    })
}
</script>
<?php
    include pathOf('includes/pageend.php');
?>