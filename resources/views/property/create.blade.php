@extends("base")
@section("content")
<div class="profile-authentication-area ptb-50">
    <div class="container">
        <div class="page-banner-content">
            <h2>Add Property</h2>
            <h4>Category - {{ $category->name }}</h4>
        </div>
    </div>
</div>
@include('property.cats.'.$category->id)
@endsection