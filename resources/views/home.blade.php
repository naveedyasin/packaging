@extends('layouts.app')

@section('content')
    <!-- rev slider strart -->
    @includeIf('partials.slider')

    <!-- why choose section -->
    @includeIf('partials.why_choose')
    <!-- END why choose section -->

    <!-- get free quote section -->
    @includeIf('partials.quote')
    <!-- end get free quote section -->

    <!-- seo info section -->
    @includeIf('partials.info')
    <!-- END seo info section -->

    <!-- working process section -->
    @includeIf('partials.work')
    <!-- END working process section -->

    <!-- services section -->
    @includeIf('partials.services')
    <!-- END services section -->

    <!-- pricing section -->
    @includeIf('partials.pricing')
    <!-- END pricing section -->

    <!-- testimonials section -->
    @includeIf('partials.testimonials')
    <!-- END testimonials section -->

    <!-- latest media section -->
    @includeIf('partials.media')
    <!-- END latest media section -->
@endsection
