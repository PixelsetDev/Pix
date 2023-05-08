<!DOCTYPE html>
<html lang="<?= PIXELSET_LANGUAGE; ?>">
    <head>
        <title><?= WEBSITE_NAME; ?></title>
        <?php require __DIR__ . '/Include/Head.inc'; ?>

    </head>
    <body class="dark:text-white dark:bg-black">
        <?php require __DIR__ . '/Include/Nav.inc'; ?>

        <header class="py-40" style="background-image: url('<?= PIXELSET_ROOT; ?>Assets/Images/Homepage-Default-BG.webp'); background-repeat: no-repeat; background-size: cover;">
            <div class="pix-container">
                <h1 class="pix-text-xxl">
                    <span class="pix-font-medium">Welcome to</span>
                    <br>
                    <span class="pix-font-bold"><?= WEBSITE_NAME; ?></span>
                </h1>
            </div>
        </header>
    </body>
</html>