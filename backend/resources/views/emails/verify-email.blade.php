<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Your KidWatch2 Account</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans p-6">
    <div class="max-w-lg mx-auto bg-white rounded-xl shadow-md p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Verify Your KidWatch2 Account</h2>
        <p class="text-gray-700 mb-6">
            Click the button below to verify your email address and activate your account.
        </p>

        <a href="{{ $verificationUrl }}"
           class="inline-block bg-gray-900 hover:bg-black text-white font-semibold px-6 py-3 rounded-lg transition">
            Verify Email
        </a>

        <p class="mt-8 text-gray-500 text-sm">
            This link will expire in 60 minutes. If you did not create an account, no further action is required.
        </p>
    </div>
</body>
</html>
