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

        <form action="/chat" method="post" class="bg-white p-3 border-t border-gray-200">
            @csrf
            <div class="mb-2">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="名前を入力" class="w-full border border-gray-300 rounded-full px-4 py-2">
                @error('name')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex gap-2">
                <input type="text" name="body" value="{{ old('body') }}" placeholder="メッセージを入力" class="flex-1 border border-gray-300 rounded-full px-4 py-2">
                <button type="submit" class="bg-green-600 text-white font-bold rounded-full px-4 py-2">送信</button>
            </div>
            @error('body')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </form>
    </div>
</body>
</html>
