@extends('layouts.admin')

@section('title', 'Shipments Overview')

@section('content')
    <div class="pt-6 px-4">
        <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 2xl:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span>
                        <h3 class="text-base font-normal text-gray-500">Shipping Revenue this week</h3>
                    </div>
                    <div class="text-green-500 text-base font-bold">+12.5%</div>
                </div>
                <div id="main-chart"
                    class="min-h-[300px] flex items-center justify-center bg-gray-50 border-dashed border-2 border-gray-200">
                    [Logistics Flow Chart Placeholder]
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Latest Deliveries</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Destination</th>
                                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <tr>
                                <td class="p-4 text-sm text-gray-900">London, UK</td>
                                <td class="p-4 text-sm text-green-600 font-bold">In Transit</td>
                            </tr>
                            <tr>
                                <td class="p-4 text-sm text-gray-900">Dubai, UAE</td>
                                <td class="p-4 text-sm text-blue-600 font-bold">Delivered</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection