<div class="modal fade" id="countryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="countryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="countryModalLabel">Choose Country</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="category-area">
                    <div class="container">
                        <div class="row justify-content-center" data-cues="slideInUp">
                            @forelse(countires() as $key => $item)
                            <div class="col">
                                <div class="category-box">
                                    <div class="image">
                                        <img src="{{ asset('vendor/blade-flags/country-'.$item->code.'.svg') }}" width="50" height="50" />
                                    </div>
                                    <div class="content">
                                        <h3>
                                            <a href="{{ route('switch.country', ['cid' => $item->id]) }}">{{ $item->short_name }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>