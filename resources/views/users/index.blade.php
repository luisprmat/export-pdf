<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-0">
                    <div class="mb-4 min-w-full overflow-hidden overflow-x-auto align-middle border dark:border-gray-600">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-500">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-600 text-left">
                                        <span class="text-xs leading-4 font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">{{ __('Name') }}</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-600 text-left">
                                        <span class="text-xs leading-4 font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">{{ __('Email') }}</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-500 divide-solid">
                                @forelse($users as $user)
                                    <tr class="bg-white dark:bg-gray-900">
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 dark:text-gray-100">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                                            {{ $user->email }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white dark:bg-gray-900">
                                        <td colspan="2" class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-100">
                                            {{ __('No users found.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
