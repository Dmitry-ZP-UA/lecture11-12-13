<ul class="list-unstyled list-inline nav navbar-nav">
    @foreach($categories as $category)
        {{--        <li>
                    --}}{{--@if($category->children()->count() > 0)--}}{{--
                    --}}{{--@include('layouts.front.category-sub', ['subs' => null])--}}{{--
                    --}}{{--$category->children--}}{{--
                    --}}{{--@else--}}{{--
                    <a
                            @if(request()->segment(2) == $category->slug)
                            class="active"
                            @endif
                            href="{{route('front.category.slug', $category->slug)}}">
                        {{$category->formatted_name}}
                    </a>
                    --}}{{--@endif--}}{{--
                </li>--}}
        <li>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$category->formatted_name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($category->subCategories as $subCategory)
                        <a class="dropdown-item"
                           href="{{route('front.category.slug', $subCategory->slug)}}">{{$subCategory->formatted_name}}</a>
                        <br>
                    @endforeach
                </div>
            </div>
        </li>

    @endforeach
</ul>