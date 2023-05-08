<?php
    use Pix\Album;
    use Pix\URLParser;

    require_once __DIR__ . '/../Processes/Database/Album.php';
    require_once __DIR__ . '/../Processes/URLParser.php';

    $URLParser = new URLParser();
    $AlbumID = $URLParser->URLToID($_SERVER['REQUEST_URI']);
    $AlbumID = htmlspecialchars($AlbumID);

    $Album = new Album();

    $ThisAlbum = $Album->GetAlbum($AlbumID);

?><!DOCTYPE html>
<html lang="<?= PIX_LANGUAGE; ?>">
    <head>
        <title><?= $ThisAlbum->name; ?> - <?= WEBSITE_NAME; ?></title>
        <?php require __DIR__ . '/Include/Head.inc'; ?>

    </head>
    <body class="dark:text-white dark:bg-black">
        <?php require __DIR__ . '/Include/Nav.inc'; ?>

        <main class="pix-container">
            <div class="flex">
                <h1 class="pix-text-xl pix-font-bold flex-grow"><?= $ThisAlbum->name; ?></h1>
                <a href="javascript:window.history.back();" class="pix-btn pix-btn-primary">
                    <span class="self-center">Back</span>
                </a>
            </div>
            <br>
            <p class="pix-text-md"><?= $ThisAlbum->description; ?></p>
            <br>
            <div class="pix-grid">
                <?php
                $AlbumImages = $Album->GetAllAlbumImages($AlbumID);
                if ($AlbumImages == null) { ?>
                <div class="pix-card pix-colspan-full">
                    <p class="pix-card-content pix-text-sm">
                        Sorry, there's nothing here yet.
                    </p>
                </div>
                <?php
                } else {
                    foreach ($AlbumImages as $Image) {
                ?>
                <div class="pix-card">
                    <p class="pix-card-content pix-text-sm">
                        <img src="/Storage/<?= $AlbumID; ?>/<?= $Image['file']; ?>" alt="<?= $Image['alt']; ?>">
                    </p>
                </div>
                <?php } } ?>
            </div>
        </main>

        <?php require __DIR__ . '/Include/Footer.inc'; ?>

    </body>
</html>