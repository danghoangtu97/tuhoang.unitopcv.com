@if ($category->categoriesChildren->count())
    <ul class="">
        @foreach ($category->categoriesChildren as $categoryChild)
            <li class="">
                <a href="{{ route('category.edit', $categoryChild->id) }}" title="">{{ $categoryChild->name }}</a>
            </li>
        @endforeach
    </ul>
@endif
