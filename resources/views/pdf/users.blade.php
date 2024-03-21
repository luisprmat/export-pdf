<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ __('Users List') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="px-2 py-8 max-w-xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div class="text-gray-700">
            <div class="font-bold text-xl mb-2 uppercase">{{ __('Users List') }}</div>
        </div>
    </div>
    <table class="w-full text-left mb-8">
        <thead>
        <tr>
            <th class="text-gray-700 font-bold uppercase py-2">#</th>
            <th class="text-gray-700 font-bold uppercase py-2">{{ __('Name') }}</th>
            <th class="text-gray-700 font-bold uppercase py-2">{{ __('Email') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td class="py-1 text-gray-700">{{ $loop->iteration }}</td>
                <td class="py-1 text-gray-700">{{ $user->name }}</td>
                <td class="py-1 text-gray-700">{{ $user->email }}</td>
            </tr>
        @empty
            <tr class="bg-white dark:bg-gray-900">
                <td colspan="2" class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 ">
                    {{ __('No users found.') }}
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
