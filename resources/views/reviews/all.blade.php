@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/reviews/reviews.css">
    <script language="javascript" src="/js/reviews/reviews.js"></script>

@stop

@section('content')

    <div class="container">
        <h2 class="wrapper">Відгуки</h2>
        <div>
            <a href="#add_review" class="btn btn-to-add">Залишити відгук</a>
        </div>
        <div class="wrapper">
            @foreach($reviews as $review)
                <div class="review row">
                    <div class="user_name">
                        <p>{{$review->name}}</p>
                    </div>

                    <div>
                        <span class="bd_review"></span>
                        <div class="text_review">{{$review->text}}</div>
                    </div>
                </div>
            @endforeach
            <div class="wrapper">
                {{$reviews->links()}}
            </div>

        </div>


        <div id="add_review">
            <div class="wrapper">
                    @include('widgets.reviews_form.add')
                    {{csrf_field()}}

                <div id="succes_review">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="bd"></span>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-success successAdd">Дякуємо за відгук!</div>
                </div>

            </div>
        </div>
    </div>

@stop