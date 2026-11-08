<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>チャット</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-300">
    <div class="max-w-sm mx-auto min-h-screen flex flex-col bg-gray-100">
        <h1 class="bg-green-600 text-white text-lg font-bold text-center py-3">チャット</h1>

        <div class="flex-1 p-4 space-y-4">
            @foreach ($messages as $message)
                <div>
                    <p class="text-xs text-gray-500 mb-1">{{ $message['name'] }}</p>
                    <p class="inline-block bg-white rounded-2xl px-4 py-2 shadow-sm">{{ $message['body'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
