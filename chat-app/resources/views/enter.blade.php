<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入室</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-300">
    <div class="max-w-sm mx-auto min-h-screen flex flex-col bg-gray-100">
        <h1 class="bg-green-600 text-white text-lg font-bold text-center py-3">入室</h1>

        <form action="/enter" method="post" class="p-4 space-y-3">
            @csrf
            <div>
                <input type="text" name="nickname" value="{{ old('nickname') }}" placeholder="ニックネームを入力" class="w-full border border-gray-300 rounded-full px-4 py-2 bg-white">
                @error('nickname')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-green-600 text-white font-bold rounded-full px-4 py-2">入室する</button>
        </form>
    </div>
</body>
</html>
