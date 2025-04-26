@extends("base")
@section("content")
<div class="profile-authentication-area ptb-50">
    <div class="container">
        <div class="page-banner-content">
            <h2>Featured Categories</h2>
            <h4>Choose a category</h4>
        </div>
    </div>
</div>
<!-- Start Category Area -->
<div class="category-area pb-95">
    <div class="container">
        <div class="row justify-content-center" data-cues="slideInUp">
            @forelse(propertyCategories() as $key => $item)
            <div class="col-lg-3 col-sm-6">
                <div class="category-card">
                    <div class="image">
                        <img src="{{ asset('assets/images/category/'.$item->image) }}" alt="image">
                    </div>
                    <div class="content">
                        <h3>
                            <a href="{{ route('add.property', ['cid' => encrypt($item->id)]) }}">{{ $item->name }}</a>
                        </h3>
                        <span>(26 Properties)</span>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
<!-- End Category Area -->
@endsection