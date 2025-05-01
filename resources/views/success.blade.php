@extends("base")
@section("content")
<div class="add-listing-area mb-5">
    <div class="container">
        <div class="not-found-area ptb-50">
            <div class="container">
                <div class="not-found-content text-center">
                    <img src="{{ asset('assets/images/check.png') }}" alt="success-image" width="10%">
                    <h3>Success</h3>
                    <h5 class="text-success">Your Property has been submitted successfully with the id of <span class='text-dark'>#{{ $pnumber }}</span> ! We will review and update the status shortly!</h5>
                    <a href="{{ route('choose.category') }}" class="default-btn mt-3">
                        List Another Property
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection