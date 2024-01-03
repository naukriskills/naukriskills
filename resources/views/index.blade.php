@extends('layouts.app')
@section('content')
<div class="intro-banner" data-background-image="{{ asset('assets/images/home-background-03.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="utf-banner-headline-text-part">
                    <h3>Change Your Career Starts Now!</h3> <span>Find Jobs, Employment & Career Making Over 100,000
                        Applications Every
                        Day.</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="utf-intro-banner-search-form-block margin-top-40">
                    <div class="utf-intro-search-field-item">
                        <input id="intro-keywords" type="text" placeholder="Search Jobs Keywords...">
                        <i class="icon-feather-search"></i>
                    </div>
                    <div class="utf-intro-search-field-item">
                        <select class="selectpicker default" data-live-search="true" data-selected-text-format="count"
                            data-size="5" title="Select Location">
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                            <option>Brazil</option>
                            <option>Burundi</option>
                            <option>Bulgaria</option>
                            <option>Germany</option>
                            <option>Grenada</option>
                            <option>Guatemala</option>
                            <option>Iceland</option>
                        </select>
                    </div>
                    <div class="utf-intro-search-button">
                        <button class="button ripple-effect"
                            onclick="window.location.href='jobs-list-layout-leftside.html'"><i
                                class="icon-material-outline-search"></i> Search Jobs</button>
                    </div>
                </div>
                <p class="utf-trending-silver-item"><span class="utf-trending-black-item">Trending Jobs Keywords:</span>
                    <a href="#">Web
                        Designer</a> <a href="#">Web Developer</a> <a href="#">Graphic Designer</a> <a href="#">PHP
                        Developer</a> <a href="#">IOS Developer</a> <a href="#">Android Developer</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main_popular_categories">
                    <ul class="main_popular_categories_list">
                        @foreach($category as $key=>$cate_rows):
                        <li> <a href="listings_grid_with_sidebar.html">
                                <div class="utf_box"> <i class="{{ $cate_rows->css_class }}"></i>
                                    <p>{{ $cate_rows->name }}</p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection