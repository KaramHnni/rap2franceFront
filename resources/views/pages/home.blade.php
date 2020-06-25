@extends('layouts.site')

@section('main-section')
	@include('components.homepage.featuredPosts')
	@include('components.ad')
	@include('components.homepage.topWeek')
	@include('components.homepage.streetPosts')
	@include('components.homepage.FeaturedSlider')
	@include('components.homepage.lifeStylePosts')
	@include('components.homepage.CinePosts')
	@include('components.homepage.MovePosts')
	@include('components.homepage.instagramPictures')
	@include('components.homepage.footer')
@endsection