@props(['message','type'])

<div class="alert testdata alert-{{ $type }} light-mode mb-4">
    <div class="flex items-center space-x-3 rtl:space-x-reverse">
        <iconify-icon class="text-2xl flex-0" icon="system-uicons:target"></iconify-icon>
        <p class="flex-1 font-Inter">{{ $message }}</p>
        <div class="flex-0 text-xl cursor-pointer">
            <button type="button">
                <iconify-icon icon="line-md:close"
                              class="relative top-[2px] " id="close">
                </iconify-icon>
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script type="module">
    $("#close").click(function(){
        $(".alert").hide();
    });
</script>
@endpush 