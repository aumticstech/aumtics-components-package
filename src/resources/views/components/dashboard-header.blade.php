@props(['pageTitle', 'breadcrumbItems'])

<div>
    <!-- BEGIN: Header -->
    <div class="z-[9] border-b sticky border-slate-100" id="app_header">
        <div class="app-header ltr:ml-[205px] rtl:mr-[205px] bg-white dark:bg-slate-800 border-b ">
            <div class="flex justify-between items-center h-full">
                <div class="flex items-center space-x-4 xl:space-x-0 vertical-box">
                    <a href="{{ url('/') }}" class="mobile-logo md:hidden inline-block">
                        <img src="{{ asset('images/logo/fav-icon.png') }}" class="black_logo h-8" alt="logo">
                        <img src="{{ asset('images/logo/fav-icon.png') }}" class="white_logo h-8" alt="logo">
                    </a>
                    <button class="smallDeviceMenuController hidden sm:inline-block md:hidden">
                        <iconify-icon
                            class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white"
                            icon="heroicons-outline:menu-alt-3"></iconify-icon>
                    </button>
                    <div class="flex gap-4 sm:flex-col sm:gap-none md:items-center">
                        <h6 class="text-[16px] font-Outfit font-semibold dark:text-white sm:mb-0">
                            {{ $pageTitle ?? '' }}
                        </h6>
                        <ul class="m-0 p-0 list-none">
                            @foreach ($breadcrumbItems as $breadcrumbItem)
                                @if (isset($breadcrumbItem['active']) && $breadcrumbItem['active'])
                                    <li class="inline-block text-[12px] font-Outfit">
                                        <span
                                            class="breadcrumbList breadcrumbActive text-slate-800 dark:text-slate-300 text-[12px]">
                                            {{ $breadcrumbItem['name'] ?? '' }}
                                        </span>
                                    </li>
                                @else
                                    <li class="inline-block relative text-sm text-slate-400 font-Outfit">
                                        <a href="{{ $breadcrumbItem['url'] ?? 'javascript:void(0)' }}"
                                            class="breadcrumbList text-[12px]">
                                            {{ $breadcrumbItem['name'] ?? '' }}
                                            <iconify-icon icon="radix-icons:slash"
                                                class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Header Actions -->
                <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse">
                    {{ $slot ?? '' }}
                </div>
            </div>
        </div>
    </div>
    <!-- END: Header -->
</div> 