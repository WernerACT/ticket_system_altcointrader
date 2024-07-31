<!-- resources/views/helpdesk/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<x-helpdesk.head />
<x-helpdesk.banner />

<x-helpdesk.home.main>
    <x-helpdesk.card title="Getting Started" description="This is the description for card 1." href="#" />
    <x-helpdesk.card title="Account Verification" description="This is the description for card 2." href="#" />
    <x-helpdesk.card title="Trading" description="This is the description for card 3." href="#" />
    <x-helpdesk.card title="Deposits" description="This is the description for card 4." href="#" />
    <x-helpdesk.card title="Withdrawals" description="This is the description for card 4." href="#" />
    <x-helpdesk.card title="Easy Save" description="This is the description for card 4." href="#" />
    <x-helpdesk.card title="Frequently Asked Questions" description="This is the description for card 4." href="#" />
    <x-helpdesk.card title="Account Security" description="This is the description for card 4." href="#" />
    <x-helpdesk.card title="Support Escalation & Complaints" description="This is the description for card 4." href="#" />
</x-helpdesk.home.main>

</body>
</html>
