@extends('frontend.layouts.app', ['page_slug' => 'home'])

@section('title', 'Home')

@section('content')
{{-- Unmatched Performance --}}
   <div class="container">
        <div class="main p-4 rounded-xl bg-gradient-primary">
            <div class="left_side">
                <h2 class="text-4xl ">{{ __('Unmatched Performance') }}</h2>
                <p>{{__('Upgrade your devices with cutting-edge technology.')}}</p>
                <a href="#" class="btn-primary">{{__('Shop Now')}} <i data-lucide="chevron-right"></i></i></a>
            </div>
            <div class="right_side">
                <img src="{{ asset('frontend/images/hero.png') }}" alt="">
            </div>
        </div>
   </div>
@endsection
