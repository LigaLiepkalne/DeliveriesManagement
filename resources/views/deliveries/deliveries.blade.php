<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Client List
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($clientDeliveryData->unique(1) as $client)
                <ul class="font-light mb-6 text-gray-800 leading-tight">
                    <li><span class="font-semibold">Name: </span>{{ $client->name }}</li>
                    <li><span class="font-semibold">Phone number: </span>{{ $client->phone }}</li>
                    <li><span class="font-semibold">E-mail: </span>{{ $client->email }}</li>
                </ul>
            @endforeach
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xl text-gray-600 uppercase bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3">
                                    Address
                                </th>
                                <th class="px-6 py-3">
                                    Date
                                </th>
                                <th class="px-6 py-3">
                                    Price
                                </th>
                                <th class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientDeliveryData as $client)
                                <tr class="bg-white border-b light:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-gray-500">
                                        {{ $client->title }}
                                    </th>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-gray-500">
                                        {{ $client->date }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-gray-500">
                                        {{$client->price_sum}} €

                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-gray-500">
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
