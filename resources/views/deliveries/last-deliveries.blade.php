<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Last completed delivery
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xl text-gray-600 uppercase bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3">
                                    Name
                                </th>
                                <th class="px-6 py-3">
                                    Address
                                </th>
                                <th class="px-6 py-3">
                                    Item
                                </th>
                                <th class="px-6 py-3 ">
                                    Price
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lastDeliveries as $delivery)
                                <tr class="bg-white border-b light:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-black">
                                        {{ $delivery->name }}
                                    </th>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-gray-500">
                                        {{ $delivery->title }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-gray-500">
                                        {{ $delivery->item }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-gray-500">
                                        {{ $delivery->price_sum }} €
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <span class="text-sm text-gray-500 p-4">Total results: {{ $total }} </span>
                        <!-- Previous Button -->
                        <a href="{{ url()->current() . '?page=' . ($currentPage - 1) }}"
                           class="inline-flex  px-4 py-2 mt-2 text-sm font-medium text-gray-500 bg-white border border-gray-300
                           rounded-lg hover:bg-ggray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                           @if($currentPage <= 1)
                               disabled
                            @endif
                        > <
                        </a>
                        <!-- Next Button -->
                        <a href="{{ url()->current() . '?page=' . ($currentPage + 1) }}"
                           class="inline-flex px-4 py-2 mt-2  text-sm font-medium text-gray-500 bg-white border border-gray-300
                           rounded-lg hover:bg-ggray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                           @if($currentPage >= $lastPage)
                               disabled
                            @endif
                        > >
                        </a>
                    </div>

               </div>
            </div>
        </div>
    </div>
</x-app-layout>
