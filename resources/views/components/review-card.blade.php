<div class="bg-white p-6 rounded-2xl shadow-sm mb-4">
    <div class="flex items-start gap-4 mb-2">
        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xl">
            👤
        </div>
        <div>
            <h4 class="font-semibold text-gray-800 leading-tight">
                {{ $review->user->name ?? 'Anonim' }}
            </h4>
            <p class="text-sm text-gray-500">
                {{ $review->user->job ?? '-' }}
            </p>
        </div>
    </div>
    <p class="text-gray-800 text-sm mb-3">
        {{ $review->review }}
    </p>
    <div class="flex gap-1">
        @for ($i = 0; $i < 5; $i++)
            <img src="{{ asset('assets/icon/star.png') }}" alt="Star"
                class="w-4 h-4 opacity-{{ $i < $review->rating ? '100' : '10' }}">
        @endfor
    </div>
</div>
