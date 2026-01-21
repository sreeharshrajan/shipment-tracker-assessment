@php
    use App\Constants\ShipmentStatus;
@endphp

@forelse($shipments as $shipment)
    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200 border-r border-l border-gray-200 dark:border-gray-700">
        
        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 dark:text-white">
            <div class="text-base font-semibold">{{ $shipment->tracking_number }}</div>
        </td>
        
        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500 dark:text-gray-400">
            {{ $shipment->receiver_name }}
        </td>
        
        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900 dark:text-white">
            {{ $shipment->destination_city }}
        </td>
        
        <td class="p-4 whitespace-nowrap">
            @php
                // Updated match with Dark Mode classes (using bg-opacity/30 for better contrast)
                $statusClasses = match ($shipment->status) {
                    ShipmentStatus::PENDING => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300 border-yellow-200 dark:border-yellow-800',
                    ShipmentStatus::TRANSIT => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 border-blue-200 dark:border-blue-800',
                    ShipmentStatus::DELIVERED => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border-green-200 dark:border-green-800',
                    default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 border-gray-200 dark:border-gray-600',
                };
            @endphp
            <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold rounded-full border {{ $statusClasses }}">
                {{ ucfirst($shipment->status) }}
            </span>
        </td>
        
        <td class="p-4 whitespace-nowrap space-x-2">
            <a href="{{ route('admin.shipments.show', $shipment->id) }}"
                class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center dark:focus:ring-cyan-800 transition-colors">
                <i data-lucide="eye" class="w-4 h-4 mr-2"></i>
                View Details
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="p-8 text-center text-gray-500 dark:text-gray-400 italic">
            <div class="flex flex-col items-center justify-center">
                <i data-lucide="inbox" class="w-8 h-8 mb-2 opacity-50"></i>
                <p>No shipments found matching your search.</p>
            </div>
        </td>
    </tr>
@endforelse

<tr id="pagination-links" class="hidden">
    <td colspan="5">
        {{ $shipments->appends(request()->query())->links() }}
    </td>
</tr>