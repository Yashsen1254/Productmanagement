<?php
    require '../includes/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Tailwind CSS Admin & Dashboard Template" />
    <meta name="author" content="Webonzer" />

    <title>DashHub - Tailwind CSS Admin & Dashboard Template</title>

    <link rel="shortcut icon" href="<?= urlOf('assets/images/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/css/style.css') ?>">

</head>

<body x-data="main" class="font-inter text-base antialiased font-medium relative vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">

    <!-- Start Layout -->
    <div class="bg-white dark:bg-dark text-dark dark:text-white bg-[url('images/autho-light-bg.html')] dark:bg-[url('images/autho-dark-bg.html')] bg-fixed bg-cover bg-center min-h-screen">
        <!-- Start Content -->
        <div class="relative">
            <div class="md:p-10 p-6 flex items-center justify-center sm:justify-between w-full flex-wrap gap-5">
                <a class='main-logo' href='index.html'>
                    <img src="<?= urlOf('assets/images/logo-dark.svg') ?>" class="dark-logo h-8 logo dark:hidden" alt="logo" />
                    <img src="<?= urlOf('assets/images/logo-light.svg') ?>" class="light-logo h-8 logo hidden dark:block" alt="logo" />
                </a>
            </div>
            <div class="min-h-[calc(100vh-192px)] p-7 flex justify-center items-center">
                <div class="sm:p-[60px] p-9 border-2 border-gray/10 dark:border-gray/20 bg-white/10 dark:bg-white/[0.02] backdrop-blur-3xl max-w-[620px] mx-auto rounded-lg w-full">
                    <p class="text-3xl font-semibold">Log In</p>
                    <form class="mt-[60px] space-y-5">
                        <div class="relative">
                            <input type="text" id="Name" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] ps-5 pe-14" placeholder="UserName" autofocus>
                        </div>
                        <div class="relative">
                            <input type="password" id="Password" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] ps-5 pe-14" placeholder="Password">
                        </div>
                        <div class="!mt-[50px]">
                            <button type="button" onclick="sendData()" class="btn bg-primary py-6 uppercase tracking-widest font-bold text-sm rounded-[10px] text-white w-full hover:bg-primary/90 duration-300">
                                Sign In
                            </button>
                        </div>
                    </form>
                   
                </div>
            </div>
<?php
    include pathOf('includes/scripts.php');
    ?>
    <script>
    function sendData() {
        var data = {
            Name: $('#Name').val(),
            Password: $('#Password').val()
        }

        $.post('../api/login.php', data, function (response) {
            console.log(response);
            if (response.success !== true)
                return;

            window.location.href = '../index.php';
        });
    }
</script>
    <?php
    include pathOf('includes/pageend.php');
?>