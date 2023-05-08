<?php
    use Pix\Album;
    use Pix\URLParser;
    require __DIR__ . '/../Processes/Database/Album.php';
    require __DIR__ . '/../Processes/URLParser.php';

    $Album = new Album();
    $Albums = $Album->GetAll();
?><!DOCTYPE html>
<html lang="<?= PIX_LANGUAGE; ?>">
    <head>
        <title><?= WEBSITE_NAME; ?></title>
        <?php require __DIR__ . '/Include/Head.inc'; ?>

    </head>
    <body class="dark:text-white dark:bg-black">
        <?php require __DIR__ . '/Include/Nav.inc'; ?>

        <header class="py-40" style="background-image: url('<?= PIX_ROOT; ?>Assets/Images/Homepage-Default-BG.webp'); background-repeat: no-repeat; background-size: cover;">
            <div class="pix-container">
                <h1 class="pix-text-xxl text-white">
                    <span class="pix-font-medium">Welcome to</span>
                    <br>
                    <span class="pix-font-bold"><?= WEBSITE_NAME; ?></span>
                </h1>
            </div>
        </header>

        <main class="pix-container">
            <h2 class="pix-text-lg pix-font-bold mb-4">Albums</h2>

            <div class="pix-grid">
                <?php if ($Albums == NULL) { ?>
                <div class="pix-card pix-colspan-full">
                    <p class="pix-card-content pix-text-md pix-font-medium">
                        Sorry, there's nothing here yet.
                    </p>
                </div>
                <?php
                } else {
                    foreach ($Albums as $PixAlbum) {
                        $URLParser = new URLParser();
                ?>
                <a class="pix-card" href="<?= PIX_ROOT; ?>album/<?= $PixAlbum['id']; ?>-<?= $URLParser->TextToURL($PixAlbum['name']); ?>">
                    <div class="pix-card-content">
                        <h3 class="pix-text-md pix-font-medium">
                            <?= $PixAlbum['name']; ?>
                        </h3>
                        <h3 class="pix-text-sm">
                            <?= $PixAlbum['description']; ?>
                        </h3>
                    </div>
                </a>
                <?php }} ?>
            </div>
        </main>

        <?php require __DIR__ . '/Include/Footer.inc'; ?>

    </body>
</html>