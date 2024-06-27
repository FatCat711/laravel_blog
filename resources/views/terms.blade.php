@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in dignissim ante. Cras bibendum metus
                lobortis dolor maximus, eu eleifend elit scelerisque. Pellentesque placerat semper dolor, consequat
                vestibulum ipsum cursus quis. Sed mollis suscipit lacus, non efficitur dolor placerat eget. Aenean a
                pharetra tortor, a aliquam sapien. Integer volutpat nulla vel imperdiet viverra. Ut vel scelerisque urna.
                Integer faucibus, nibh in convallis faucibus, metus erat sollicitudin nisi, sit amet luctus nunc ligula
                vitae purus. Cras non velit et ante maximus facilisis. Aliquam eu mi semper, blandit mauris eu, porta ex.
                Etiam felis nisl, rhoncus sollicitudin sollicitudin id, aliquet nec dui. Donec at egestas tellus. Aliquam
                convallis vel libero vitae eleifend. Ut scelerisque quis purus iaculis egestas. Nam felis ex, commodo sit
                amet lacinia non, vehicula mollis leo.
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
