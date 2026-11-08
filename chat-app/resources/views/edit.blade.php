<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メッセージの編集</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-300">
    <div class="max-w-sm mx-auto min-h-screen flex flex-col bg-gray-100">
        <h1 class="bg-green-600 text-white text-lg font-bold text-center py-3">メッセージの編集</h1>

        <form action="/chat/{{ $message['id'] }}" method="post" class="p-4">
            @csrf
            @method('PUT')
            <div class="flex gap-2">
                <input type="text" name="body" value="{{ old('body', $message['body']) }}" placeholder="メッセージを入力" class="flex-1 border border-gray-300 rounded-full px-4 py-2 bg-white">
                <button type="submit" class="bg-green-600 text-white font-bold rounded-full px-4 py-2">更新する</button>
            </div>
            @error('body')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </form>
    </div>
</body>
</html>
