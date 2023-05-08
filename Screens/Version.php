<?php
    $ImageMagick = new Imagick();
?><!DOCTYPE html>
<html lang="<?= PIX_LANGUAGE; ?>">
    <head>
        <title>Version - <?= WEBSITE_NAME; ?></title>
        <?php require __DIR__ . '/Include/Head.inc'; ?>

    </head>
<body class="dark:text-white dark:bg-black">
    <?php require __DIR__ . '/Include/Nav.inc'; ?>

    <main class="pix-container">
        <h1 class="pix-text-xl pix-font-bold pix-header">About Pix</h1>
        <h2 class="pix-text-lg pix-font-medium pix-header">License</h2>
        <p>
            Copyright 2023 - <?= date('Y'); ?> Lewis Milburn<br>
            <br>
            Licensed under the Apache License, Version 2.0 (the "License");
            you may not use this file except in compliance with the License.
            You may obtain a copy of the License at<br>
            <br>
            <a href="http://www.apache.org/licenses/LICENSE-2.0" class="pix-inline-link" target="_blank">
                http://www.apache.org/licenses/LICENSE-2.0
            </a><br>
            <br>
            Unless required by applicable law or agreed to in writing, software
            distributed under the License is distributed on an "AS IS" BASIS,
            WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
            See the License for the specific language governing permissions and
            limitations under the License.
        </p>
        <h2 class="pix-text-lg pix-font-medium pix-header">Software</h2>
        <table>
            <tr>
                <th class="pix-th">Software</th>
                <th class="pix-th">Version</th>
            </tr>
            <tr>
                <td class="pix-td">Pix</td>
                <td class="pix-td"><?= PIX_VERSION; ?> (<?= PIX_VERSION_CODENAME; ?>)</td>
            </tr>
            <tr>
                <td class="pix-td">PHP</td>
                <td class="pix-td"><?= phpversion(); ?></td>
            </tr>
            <tr>
                <td class="pix-td">Imagick</td>
                <td class="pix-td"><?= $ImageMagick::getVersion()['versionString']; ?></td>
            </tr>
        </table>
    </main>

    <?php require __DIR__ . '/Include/Footer.inc'; ?>

    </body>
</html>