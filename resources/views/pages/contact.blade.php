<x-layouts.app>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h2>Contact</h2>


        <?php
        // Variabelen voor fout- en succesmeldingen
        $contact_errors = [];
        $contact_success = false;

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['contact_submit'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $message = htmlspecialchars($_POST['message']);

            if (!$email) {
                $contact_errors[] = "Ongeldig e-mailadres.";
            }
            if (empty($name)) {
                $contact_errors[] = "Naam is verplicht.";
            }
            if (empty($message)) {
                $contact_errors[] = "Bericht is verplicht.";
            }

            if (empty($contact_errors)) {
                $to = "altsem194@gmail.com";
                $subject = "Contactformulier Pra-c2-2025-sept-semg-djay-cas-pra.test";

                $headers = "From: no-reply@Pra-c2-2025-sept-semg-djay-cas-pra.test\r\n";
                $headers .= "Reply-To: $email\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                $body = "Naam: $name\n";
                $body .= "E-mail: $email\n\n";
                $body .= "Bericht:\n$message";

                if (mail($to, $subject, $body, $headers)) {
                    $contact_success = true;
                } else {
                    $contact_errors[] = "Versturen mislukt. Probeer het later opnieuw.";
                }
            }
        }
        ?>

    <?php if ($contact_success): ?>
    <div style="padding:12px;background:#e8fff1;border:1px solid #c6f0dc;border-radius:8px">
        Dank! Uw bericht is ontvangen. We nemen zo snel mogelijk contact op!
    </div>
    <?php else: ?>
    <?php    if (!empty($contact_errors)): ?>
    <div style="padding:12px;background:#fff1f1;border:1px solid #f0c6c6;border-radius:8px;color:#8a1b1b">
        <ul>
            <?php        foreach ($contact_errors as $err)
            echo '<li>' . htmlspecialchars($err) . "</li>"; ?>
        </ul>
    </div>
    <?php    endif; ?>
    <form action="" method="POST" class="contact-form">
        {{ __('misc.name') }}
        <input id="name" name="name" required value="<?php    echo htmlspecialchars($_POST['name'] ?? ''); ?>">

                <label for="email">E-mail</label>
                <input id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">

         {{ __('misc.msg') }}
        <textarea id="message" name="message"
            rows="6"><?php    echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>

        <div style="margin-top:10px">
            <button class="btn" type="submit" name="contact_submit">{{ __('misc.sent') }}</button>
        </div>
    </form>
    <?php endif; ?>

    </body>

    </html>

</x-layouts.app>