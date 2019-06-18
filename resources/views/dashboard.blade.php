<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bacon</title>
        <link rel="stylesheet" href="{{ mix('/css/main.css') }}">
    </head>
    <body>
    <div class="min-h-screen bg-gray-200 flex flex-wrap content-center justify-center">
        @foreach($employees as $employee)
            <div class="max-w-sm w-full md:w-2/6 my-2 mx-2 md:my-6 md:mx-6 flex p-6 pb-0 bg-white rounded-lg shadow-xl {{ $employee->is_at_work ? '' : 'opacity-25' }}">
                <div class="flex-shrink-0">
                    <img class="h-16 w-16 rounded-full" src="{{  $employee->getThumbs200ForCollection('avatar')->first()['thumb_url'] }}" alt="{{ $employee->name }}">
                </div>
                <div class="ml-6 pt-1">
                    <h4 class="text-xl text-gray-900 leading-tight mb-3">
                        {{ $employee->name }}
                    </h4>
                    <span class="inline-block {{  $employee->is_at_work ? 'bg-green-500' : 'bg-red-500' }} rounded-full px-3 py-1 text-sm font-semibold text-gray-200 mr-2 mb-3">
                        {{ $employee->is_at_work ? 'At work' : $employee->last_seen_at->format('d.m H:i') }}
                    </span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-6">
                        {{ trans_choice('dashboard.devices', count($employee->devices)) }}
                    </span>
                </div>
            </div>


        @endforeach
    </div>

    {{--@include('api-test')--}}
    </body>
</html>
