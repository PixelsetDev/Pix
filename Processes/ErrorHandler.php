<?php

namespace Pix;

class ErrorHandler {
    function Fatal(string $ErrorMessage) {
        echo '<!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Fatal Error</title>
                <style>
                    body { font-family: sans-serif; }
                </style>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            </head>
            <body>
                <p style="text-align:center; font-size: 2.5rem;">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </p>
                <h1 style="text-align:center;">Fatal Error</h1>
                <p style="text-align:center;">The application encountered a fatal error and was unable to continue.</p>
                <br>
                <h2>Full error log:</h2>
                <code>'.$ErrorMessage.'</code>
            </body>
        </html>';
        ob_end_flush();
        exit;
    }
}