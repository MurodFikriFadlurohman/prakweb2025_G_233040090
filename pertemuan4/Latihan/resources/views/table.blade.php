<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body bg-neutral-secondary-soft border-b rounded-base border-default">
        <thead>
            <tr class="bg-default">
                <th scope="col" class="px-6 py-3 font-medium">
                    No
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Image
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Category
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Published At
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr class="tr class=bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $loop->firstItem() + $loop->index }}
                    </th>

                    <td class="px-6 py-4">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-16 h-16 rounded-base object-cover">
                        @else
                            <img id="preview" 
                                 class="w-16 h-16 rounded-base object-cover border border-default bg-gray-100" 
                                 src="{{ asset('images/preview.jpg') }}" 
                                 alt="Image Preview">
                        @endif
                    </td>

                    <td class="px-6 py-4">
                        {{ $post->title }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $post->category?->name ?? 'Uncategorized' }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $post->created_at->format('D M Y') }}
                    </td>

                    <td class="px-6 py-4 flex gap-3">
                        <a href="{{ route('dashboard.show', $post->slug) }}" class="text-blue-600 hover:underline">
                            View
                        </a>

                        <a href="{{ route('dashboard.edit', $post->slug) }}" class="text-green-600 hover:underline">
                            Edit
                        </a>

                        <form action="{{ route('dashboard.destroy', $post->slug) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        No posts yet. <a href="{{ route('dashboard.create') }}" class="text-blue-600 hover:underline">Create one</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>