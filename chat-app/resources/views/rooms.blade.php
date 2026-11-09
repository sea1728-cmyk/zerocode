<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ルーム一覧</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-300">
    <div class="max-w-sm mx-auto min-h-screen flex flex-col bg-gray-100">
        <h1 class="bg-green-600 text-white text-lg font-bold text-center py-3">ルーム一覧</h1>

        <ul class="flex-1 p-4 space-y-3">
            @foreach ($rooms as $room)
                <li>
                    <a href="/rooms/{{ $room['id'] }}" class="block bg-white rounded-2xl px-4 py-3 shadow-sm">{{ $room['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
