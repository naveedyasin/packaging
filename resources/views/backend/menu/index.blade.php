@extends('backend.app')
@section('template_title', 'Menu')
@section('header', 'Menu')
@section('content')
    <div class="content pt-0">
        <div class="row">
            <div class="col-md-4">
                <div id="accordion-styled" class="card-group-control card-group-control-right">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h6 class="card-title">
                                <a data-toggle="collapse" class="text-white collapsed"
                                   href="#accordion-styled-group1" aria-expanded="false">Pages</a>
                            </h6>
                        </div>

                        <div id="accordion-styled-group1" class="collapse"
                             data-parent="#accordion-styled" style="">
                            <div class="card-body">
                                <div class="tab-div">
                                    @foreach($pages as $page)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="checkbox_stacked_{{$page->id}}">
                                            <label class="custom-control-label"
                                                   for="checkbox_stacked_{{$page->id}}">{{$page->title}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-primary">
                            <h6 class="card-title">
                                <a class="text-white collapsed" data-toggle="collapse"
                                   href="#accordion-styled-group2" aria-expanded="false">Posts</a>
                            </h6>
                        </div>

                        <div id="accordion-styled-group2" class="collapse"
                             data-parent="#accordion-styled" style="">
                            <div class="card-body">
                                <div class="tab-div">
                                    @foreach($posts as $post)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="checkbox_stacked_{{$post->id}}">
                                            <label class="custom-control-label"
                                                   for="checkbox_stacked_{{$post->id}}">{{$post->title}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-primary">
                            <h6 class="card-title">
                                <a class="text-white collapsed" data-toggle="collapse"
                                   href="#accordion-styled-group3"
                                   aria-expanded="false">Categories</a>
                            </h6>
                        </div>

                        <div id="accordion-styled-group3" class="collapse"
                             data-parent="#accordion-styled" style="">
                            <div class="card-body">
                                <div class="tab-div">
                                    @foreach($categories as $category)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="checkbox_stacked_{{$category->id}}">
                                            <label class="custom-control-label"
                                                   for="checkbox_stacked_{{$category->id}}">{{$category->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h6 class="card-title">
                                <a class="text-white collapsed" data-toggle="collapse"
                                   href="#accordion-styled-group4" aria-expanded="false">Custom
                                    Links</a>
                            </h6>
                        </div>

                        <div id="accordion-styled-group4" class="collapse"
                             data-parent="#accordion-styled" style="">
                            <div class="card-body">
                                3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                tempor, sunt aliqua put a bird on it.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="dd" id="nestable3">
                    <ol class="dd-list">
                        <li class="dd-item dd3-item" data-id="13">
                            <div class="dd-handle dd3-handle">Drag</div>
{{--                            <div class="dd3-content">Item 13</div>--}}
                            <div class="card">
                            <div class="card-header bg-primary">
                                <h6 class="card-title">
                                    <a class="text-white collapsed" data-toggle="collapse"
                                       href="#accordion-styled-group4" aria-expanded="false">Custom
                                        Links</a>
                                </h6>
                            </div>
                            <div id="accordion-styled-group4" class="collapse"
                                 data-parent="#accordion-styled" style="">
                                <div class="card-body">
                                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                    tempor, sunt aliqua put a bird on it.
                                </div>
                            </div>
                            </div>
                        </li>
                        <li class="dd-item dd3-item" data-id="14">
                            <div class="dd-handle dd3-handle">Drag</div>
                            <div class="dd3-content">Item 14</div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/nestable2/jquery.nestable.css') }}">
    <style>
        .card {margin-bottom: 2px;}
        .tab-div{max-height: 200px; overflow-y: auto;}
    </style>
@endsection
@push('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/nestable2/jquery.nestable.js') }}"></script>
    <script>
        $(function () {
            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
// activate Nestable for list 1
            $('#nestable3').nestable();
           /* $('#menu-items').nestable('add', {
                "id": 1,
                "content": 'sdfsdf',
                "name": 'name',
                "url": 'http://url.com',
                "url_type": 'route',
                "open_in_new_tab": 1,
            });*/
        });
    </script>
@endpush
