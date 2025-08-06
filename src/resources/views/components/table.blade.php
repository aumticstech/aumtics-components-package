<div class="card" @if( $cardId) id="{{ $cardId }}" @endif>
    <div class="card-body">
        <div class="dashcode-data-table">
            <div class="inline-block w-full align-middle">
                <div class="overflow-x-auto ">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div> 