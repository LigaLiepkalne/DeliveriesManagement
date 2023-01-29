

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client List') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @foreach($clientDeliveryData->unique(1) as $client)
                        {{ $client->name }}
                        {{ $client->phone }}
                        {{ $client->email }}
                    @endforeach

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientDeliveryData as $client)
                                <tr class="bg-white border-b light:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-black">
                                        {{ $client->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $client->date }}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{$client->price_sum}} €

                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $client->status }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
