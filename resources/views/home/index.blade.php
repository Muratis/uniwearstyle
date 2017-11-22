@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/index.css">
    <script language="javascript" src="/js/cataloge/sort.js"></script>

@stop

@section('content')





    <div class="container">
        <div class="wrapper">
            <div>
                <div class="item_college ">
                    <a href="/kpi/main" ><img src="images/college/kpi.png"><span class="wrapper">Uniwear КПИ Style</span></a>
                </div>

                <div class="item_college">
                    <a href="/knu/main"><img src="images/college/knu.png"><span class="wrapper">Uniwear КНУ Style</span></a>
                </div>

                <div class="item_college">
                    <a href="/nmu/main"><img src="images/college/nmu.png"><span class="wrapper">Uniwear НМУ Style</span></a>

                </div>


            </div>
        </div>
    </div>

@stop