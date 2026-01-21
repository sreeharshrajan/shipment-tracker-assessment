@extends('layouts.admin')

@section('title', 'All Shipments')

@section('content')
<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
    <div class="mb-1 w-full">
        <div class="mb-4">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-400 md:ml-2" aria-current="page">Shipments</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Shipment Management</h1>
        </div>
        <div class="sm:flex">
            <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">
                <form class="lg:pr-3" action="#" method="GET">
                    <label for="users-search" class="sr-only">Search</label>
                    <div class="relative mt-1 lg:w-64 xl:w-96">
                        <input type="text" name="id" id="shipment-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search by Tracking Number (e.g. ST-1092)">
                    </div>
                </form>
            </div>
            <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                <button type="button" class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add Shipment
                </button>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Tracking Number</th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Receiver Name</th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Destination</th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($shipments as $shipment)
                        <tr class="hover:bg-gray-100">
                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                <div class="text-base font-semibold text-gray-900">{{ $shipment->tracking_number }}</div>
                                <div class="text-sm font-normal text-gray-500">Exp. Delivery: {{ $shipment->estimated_delivery }}</div>
                            </td>
                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">{{ $shipment->origin }}</span>
                                    <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="font-medium text-gray-900">{{ $shipment->destination }}</span>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $shipment->carrier }}</td>
                            <td class="p-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $shipment->status === 'In Transit' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $shipment->status }}
                                </span>
                            </td>
                            <td class="p-4 whitespace-nowrap space-x-2">
                                <a href="{{ route('admin.shipments.show', $shipment->id) }}" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    View Details
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500 italic">No shipments found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        {{ $shipments->links() }}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection