<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $room['name'] }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-300">
    <div class="max-w-sm mx-auto min-h-screen flex flex-col bg-gray-100">
        <h1 class="relative bg-green-600 text-white text-lg font-bold text-center py-3">
            <a href="/rooms" class="absolute left-3 text-sm font-normal">‹ 一覧</a>
            {{ $room['name'] }}
            <span class="absolute right-3 text-sm font-normal">{{ session('nickname') }}</span>
        </h1>

        <div class="flex-1 p-4 space-y-4">
            @foreach ($messages as $message)
                {{-- 自分（今のニックネームと同じ名前）なら右に緑、他の人なら左に白 --}}
                @php($isMine = $message['name'] === session('nickname'))
                <div class="{{ $isMine ? 'text-right' : 'text-left' }}">
                    <p class="text-xs text-gray-500 mb-1">{{ $message['name'] }}</p>
                    {{-- 送った時刻（保存は世界の標準時なので、日本の時刻に直して 14:05 の形で出す） --}}
                    @php($time = $message->created_at?->timezone('Asia/Tokyo')->format('H:i'))
                    <div class="flex items-end gap-1 {{ $isMine ? 'justify-end' : 'justify-start' }}">
                        @if ($isMine)
                            <span class="text-xs text-gray-500">{{ $time }}</span>
                        @endif
                        <p class="inline-block rounded-2xl px-4 py-2 shadow-sm {{ $isMine ? 'bg-green-500 text-white' : 'bg-white' }}">{{ $message['body'] }}</p>
                        @if (! $isMine)
                            <span class="text-xs text-gray-500">{{ $time }}</span>
                        @endif
                    </div>
                    {{-- 編集と削除は、自分のメッセージにだけ出す --}}
                    @if ($isMine)
                        <p class="mt-1"><a href="/messages/{{ $message['id'] }}/edit" class="text-xs text-blue-600">編集</a></p>
                        <form action="/messages/{{ $message['id'] }}" method="post" class="mt-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-600">削除</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>

        <form action="/rooms/{{ $room['id'] }}" method="post" class="bg-white p-3 border-t border-gray-200">
            @csrf
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
