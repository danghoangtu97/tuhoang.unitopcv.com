@if ($category->categoriesChildren->count() > 0)
    <ul class="sub-menu">
        @foreach ($category->categoriesChildren as $categoryChild)
            <li>
                <a href="{{ route('client.listProduct', $categoryChild->slug) }}" title="">{{ $categoryChild->name }}</a>
                @include('components.categoryChild', ['category' => $categoryChild])
            </li>
        @endforeach
    </ul>
@endif
