<?php

function getFreeDomainsCount(array $emails): array
{
    define('FREE_EMAIL_DOMAINS', ['gmail.com', 'yandex.ru', 'hotmail.com']);
    $free_domains = [];

    foreach ($emails as $email) {
        $pos = strpos($email, '@');
        $domain = substr($email, $pos + 1);

        if (in_array($domain, FREE_EMAIL_DOMAINS, false)) {
            $free_domains[] = $domain;
        }

    }

    return array_count_values($free_domains);
}

$emails = [
    'info@gmail.com',
    'info@yandex.ru',
    'info@hotmail.com',
    'mk@host.com',
    'support@bitrix.com',
    'keys@yandex.ru',
    'sergey@gmail.com',
    'vovan@gmail.com',
    'vovan@hotmail.com',
];

echo '<pre>';
print_r(getFreeDomainsCount($emails));
echo '</pre>';
# => Array (
#     'gmail.com' => 3
#     'yandex.ru' => 2
#     'hotmail.com' => 2
#  )