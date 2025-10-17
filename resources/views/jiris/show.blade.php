<x-layouts.app>
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">{!! $jiri->name !!}</h1>

    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-2xl p-6 space-y-4">
        <p class="text-sm font-semibold text-gray-500 uppercase">Date</p>
        <p class="text-lg text-gray-700">{!! $jiri->date !!}</p>

        <p class="text-sm font-semibold text-gray-500 uppercase">Brève description</p>
        <p class="text-gray-700 leading-relaxed">{!! $jiri->description !!}</p>
    </div>
</x-layouts.app>
