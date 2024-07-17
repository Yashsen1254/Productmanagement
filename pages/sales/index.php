<?php
require ('../../includes/init.php');

$sales = select('SELECT * FROM sales');
$index = 0;

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Sales', $UserId);

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
                        <div class="grid grid-cols-1">
                            <div>                                
                                <?php if ($permissions['AddPermission'] == 1) { ?>
                                    <a href="./add.php" class="btn dark:hover:bg-white dark:hover:text-dark dark:text-white dark:border-white border border-dark rounded-md text-dark hover:text-white transition-all duration-300 hover:bg-dark hover:border-dark">Add</a>
                                <?php } ?>   
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-5">
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Sales Table</h2>
                                <div class="overflow-auto space-y-4" x-data="dataTable()" x-init="
                                initData()
                                $watch('searchInput', value => {
                                search(value)
                                })">
                                    <div class="flex justify-between items-center gap-3">
                                        <div class="flex space-x-2 items-center">
                                            <p>Show</p>
                                            <select id="filter" class="form-select !w-20" x-model="view" @change="changeView()">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                        <div>
                                            <input id="search" x-model="searchInput" type="text" class="form-input" placeholder="Search...">
                                        </div>
                                    </div>
                                    <div class="overflow-auto">
                                        <table class="min-w-[640px] w-full">
                                        <thead>
                                                <th width="5%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Index</p>
                                                    </div>
                                                </th>
                                                <th width="15%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Product Name</p>
                                                    </div>
                                                </th>
                                                <th width="15%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p class="">Buyer Name</p>
                                                    </div>
                                                </th>
                                                <th width="15%">
                                                    <div class="flex items-center justify-between gap-2">
                                                            <p>Buyer Number</p>
                                                    </div>
                                                </th>
                                                <th width="15%">
                                                    <div class="flex items-center justify-between gap-2">
                                                            <p>Date of Sales</p>
                                                    </div>
                                                </th>
                                                <th width="15%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Price</p>
                                                    </div>
                                                </th>
                                                <?php if ($permissions['EditPermission'] == 1) { ?>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Modify</p>
                                                    </div>
                                                </th>
                                                <?php }?>
                                                <?php if ($permissions['DeletePermission'] == 1) { ?>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Delete</p>
                                                    </div>
                                                </th>
                                                <?php }?>
                                            </thead>
                                            <tbody>
                                            <?php if ($permissions['ViewPermission'] == 1) {
                                                foreach ($sales as $sale) : ?>
                                                    <tr>
                                                        <td><?= $index += 1 ?></td>
                                                        <td><?= $sale['ProductId'] ?></td>
                                                        <td><?= $sale['BuyerName'] ?></td>
                                                        <td><?= $sale['BuyerNumber'] ?></td>
                                                        <td><?= $sale['DateOfSales'] ?></td>
                                                        <td><?= $sale['TotalPrice'] ?></td>
                                                        <?php if ($permissions['EditPermission'] == 1) { ?>
                                                            <form action="./update.php" method="post">
                                                                <td>
                                                                    <input type="hidden" value="<?= $sale['SalesId'] ?>" id="SalesId" name="SalesId">
                                                                    <button type="submit" class="btn dark:hover:bg-white dark:hover:text-dark dark:text-white dark:border-white border border-dark rounded-md text-dark hover:text-white transition-all duration-300 hover:bg-dark hover:border-dark">update</button>
                                                                </td> 
                                                            </form> 
                                                        <?php } ?>
                                                        <?php if ($permissions['DeletePermission'] == 1) { ?>
                                                            <td>
                                                                <button type="button" class="btn btn-danger btn-circle mb-2" onclick="deleteSales(<?= $sale['SalesId'] ?>)">Delete</button>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php endforeach;
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="inline-flex items-center gap-1">
                                        <li><button type="button" @click.prevent="changePage(1)" class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">First</button></li>
                                        <li><button type="button" @click="changePage(currentPage - 1)" class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">Prev</button></li>
                                        <template x-for="item in pages">
                                            <li><button @click="changePage(item)" type="button" class="flex justify-center h-9 w-9 items-center rounded transition border border-gray/20 hover:border-gray/60" x-bind:class="{ 'border-primary text-primary': currentPage === item }"><span x-text="item"></span></button></li>
                                        </template>
                                        <li><button @click="changePage(currentPage + 1)" type="button" class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">Next</button></li>
                                        <li><button @click.prevent="changePage(pagination.lastPage)" type="button" class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">Last</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End All Card -->
<?php
include pathOf('includes/scripts.php');
?>
<script>
        function deleteSales(SalesId) {
            if (confirm("sure you want to delete this sales"));
            $.ajax({
                url: "../../api/sales/delete.php",
                method: "POST",
                data: {
                    SalesId: SalesId
                },
                success: function (response) {
                    alert('Sales Deleted');
                }
            })
        }
    </script>
<?php
include pathOf('includes/pageend.php');
?>