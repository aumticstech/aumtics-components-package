<div>
    <div class="top-header bg-white px-6 py-2 sm:ml-20 ">

        <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-3 gap-3 items-center">

            <div class="relative sm:col-span-3">
                <input type="search" class="form-control !pr-12" placeholder="Search for something" id="searchInputData">
                <button
                    class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center"
                    id="dataTableSearchBtn">
                    <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                </button>
            </div>

            <span class="text-[12px] font-semibold font-Outfit md:order-first">
                {{ $headerText ?? '' }}
            </span>

            <div class="flex gap-2 justify-end items-center  col-span-2 sm:order-last          ">

                @if (isset($tableManagement['show']) && $tableManagement['show'])
                    <button class="text-xl text-center flex" type="button" data-bs-toggle="modal"
                        data-bs-target="#customizeColumns">
                        <iconify-icon icon="tdesign:tab"></iconify-icon>
                    </button>
                @endif

                {{-- Selected Export Func. --}}
                @if ($showLeakAddButton)

                    <div class="leak-header-btns flex gap-2 items-center">
                        @if(isset($lastLogData) && is_array($lastLogData) && isset($lastLogData['id']))
                            <span class="text-[12px] font-Inter {{$lastLogData['status'] == 'Success'?'text-success':'text-danger'}} ">{{ $lastLogData['status']??'' }}</span>
                        @endif
                        @if ($lastRecordTime)
                            @php
                                $time = Carbon\Carbon::parse($lastRecordTime)->format('d, M Y h:i A');
                            @endphp
                            <span class="text-[12px] font-Inter cursor-pointer text-primary-500"
                                onclick="showLogData()">
                                Last Updated at &nbsp;{{ $time   }}
                            </span>
                            <span id="leak-fetch-countdown" class="font-Inter text-[12px] text-danger-500"></span>
                        @endif
                        <button type="button" disabled data-bs-toggle="modal" data-bs-target="#fetch-leak-data"
                            class="btn fetch-leak-btn btn-sm inline-flex justify-center btn-primary items-center !p-2 !px-3">

                            <span class="font-Inter text-[12px]">Fetch Data</span>
                        </button>
                    </div>
                @endif
                @if ($module != '')
                    <div>
                        <form method="post" target="_blank">
                            @csrf
                            <input type="hidden" name="module" value="{{ $module }}">
                            <input type="hidden" name="file_format" value="xlsx">
                            <input type="hidden" name="selected_ids" class="selectedIdsInput">

                            <button type="submit"
                                class="btn btn-sm inline-flex justify-center btn-outline-primary hidden items-center exportExcelBtn !p-2 !px-3">
                                {{ __('Export Selected Data ') }}
                            </button>
                        </form>
                    </div>
                    @if ($module == 'costing-sheet')
                        <form method="post" action="{{ route('admin::exportPdf.cs') }}" target="_blank">
                            @csrf
                            <input type="hidden" name="selected_ids" class="selectedIdsInput">

                            <button type="submit"
                                class="btn btn-sm inline-flex justify-center btn-outline-primary items-center !p-2 !px-3 exportExcelBtn hidden">
                                <iconify-icon icon="ant-design:file-pdf-outlined" width="15"
                                    height="15"></iconify-icon>
                            </button>
                        </form>
                    @endif
                @endif
                {{-- Selected Export Func. --}}

                @if (hasPermission([$module, 'create']))
                    @if ($createRoute)
                        <a class="btn btn-sm inline-flex justify-center btn-primary items-center !p-2 !px-3"
                            href="{{ $createRoute }}">
                            <iconify-icon icon="ic:round-plus" class="text-lg"></iconify-icon>
                            {{ __('New') }}
                        </a>
                    @elseif ($createCanvas)
                        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#{{ $createCanvas }}"
                            class="btn btn-sm inline-flex justify-center btn-primary items-center !p-2 !px-3 canvas-add-button"
                            @if ($onclickFunc) onclick="{{ $onclickFunc }}()" @endif>
                            <iconify-icon icon="ic:round-plus" class="text-lg"></iconify-icon>
                            {{ __('New') }}
                        </button>
                    @elseif ($emitFunc)
                        <button type="button"
                            onclick="window.livewire.emit('{{ $emitFunc }}', '{{ $routeParam }}')"
                            class="btn btn-sm inline-flex justify-center btn-primary items-center !p-2 !px-3 canvas-add-button">
                            <iconify-icon icon="ic:round-plus" class="text-lg"></iconify-icon>
                            {{ __('New') }}
                        </button>
                    @endif
                @endif

                @if (hasPermission([$module, 'edit']) && $module != '' && $multiDeactivateBtn)
                    <button class="btn btn-sm inline-flex justify-center btn-outline-dark items-center !p-2 !px-3"
                        onclick="deactivateSelected('{{ $module }}')">
                        <iconify-icon icon="material-symbols:inactive-order-outline" class="text-lg"></iconify-icon>
                    </button>
                @endif

                @if (\Request::route()->getName() == 'admin::gage.index')
                    <button type="button"
                        class="shrink-0 btn btn-sm inline-flex justify-center btn-outline-primary items-center !p-2 !px-3"
                        onclick="printLable()">
                        <iconify-icon icon="fluent:print-32-regular" class="text-lg mr-1"></iconify-icon>
                        {{ __('Print Label') }}
                    </button>
                @endif

                @if ($showFilter)
                    <button type="button" data-bs-toggle="offcanvas" data-bs-target="#filter-form-offcanvas"
                        aria-controls="filter-form-offcanvas"
                        class="btn btn-sm inline-flex justify-center btn-outline-primary items-center !p-2 !px-3">
                        {!! config('constants.SVG.primary-filter') !!}
                    </button>
                @endif

                @if ((isset($module) && $module) || $import)
                    <div class="dropdown relative">
                        <button class="text-xl text-center w-full flex" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                        </button>
                        <ul
                            class="dropdown-menu min-w-[180px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                            @if ($import)
                                @if (!str_contains($module, 'leak'))
                                    <li class="border-b">
                                        <a href="{{ route('admin::imports.create', $import) }}"
                                            class="w-full text-slate-600 dark:text-white font-Inter font-normal p-2 hover:bg-slate-100 dark:hover:bg-slate-600 space-x-2 rtl:space-x-reverse inline-flex items-center dark:hover:text-white">
                                            <span class=" text-lg leading-[0]">
                                                {!! config('constants.SVG.pdf-download') !!}
                                            </span>
                                            <span class="font-inter text-[13px]">Import Data</span>
                                        </a>
                                    </li>
                                @endif
                            @endif

                            @if ($module)
                                @if ($module == 'calibration-report' || $module == 'gage-report')
                                    <li class="border-b">
                                        <a target="__blank"
                                            href="{{ route('admin::downloadReport.pdf', ['module' => $module, 'tableId' => $tableManagement['tableId'] ?? ''] + request()->all()) }}"
                                            class="w-full text-slate-600 dark:text-white font-Inter font-normal p-2 hover:bg-slate-100 dark:hover:bg-slate-600 space-x-2 rtl:space-x-reverse inline-flex items-center dark:hover:text-white">
                                            <span class=" text-lg leading-[0]">
                                                {!! config('constants.SVG.pdf-download') !!}
                                            </span>
                                            <span class="font-inter text-[13px]">Download In PDF</span>
                                        </a>
                                    </li>
                                @endif
                                <li class="border-b">
                                    <button type="button" onclick="openExportModal('{{ $module }}')"
                                        class="w-full text-slate-600 dark:text-white font-Inter font-normal p-2 hover:bg-slate-100 dark:hover:bg-slate-600 space-x-2 rtl:space-x-reverse inline-flex items-center dark:hover:text-white">
                                        <span class=" text-lg leading-[0]">
                                            {!! config('constants.SVG.pdf-download') !!}
                                        </span>
                                        <span class="font-inter text-[13px]">Export All Data</span>
                                    </button>
                                </li>
                                <li class="border-b">
                                    <button type="button" onclick="downloadExcel()"
                                        class="w-full text-slate-600 dark:text-white font-Inter font-normal p-2 hover:bg-slate-100 dark:hover:bg-slate-600 space-x-2 rtl:space-x-reverse inline-flex items-center dark:hover:text-white">
                                        <span class=" text-lg leading-[0]">
                                            {!! config('constants.SVG.pdf-download') !!}
                                        </span>
                                        <span class="font-inter text-[13px]">Export Current View</span>
                                    </button>
                                </li>
                            @endif

                            <li class="border-b">
                                <button onclick="reloadWindow()"
                                    class="w-full text-slate-600 dark:text-white font-Inter font-normal p-2 hover:bg-slate-100 dark:hover:bg-slate-600 space-x-2 rtl:space-x-reverse inline-flex items-center dark:hover:text-white">
                                    <span class=" text-lg leading-[0]">
                                        {!! config('constants.SVG.reload-circle') !!}
                                    </span>
                                    <span class="font-inter text-[13px]">Refresh</span>
                                </button>
                            </li>

                        </ul>
                    </div>
                @endif

            </div>
        </div>

    </div>

    @if ($module != '')
        @livewire('export-form', [$module])
    @endif

    @if ($showFilter)
        @livewire('filter-form', [$module, $routeParam])
    @endif

    @if (isset($tableManagement['show']) && $tableManagement['show'])
        @livewire('table-col-management', [$tableManagement['tableId']])
    @endif

    @push('scripts')
        <script>
            $("#dataTableSearchBtn").on("click", function(e) {
                e.preventDefault();
                console.log("{{ $listingTableId }}");
                getSearchedData("{{ $listingTableId }}");
            });

            $(document).on('change', '.handleExportDump', function() {
                if ($(this).is(':checked')) {
                    $('.handleExportDumpValue').prop('checked', true);
                } else {
                    $('.handleExportDumpValue').prop('checked', false);
                }
                checkExportAction();
            })

            $(document).on('change', '.handleExportDumpValue', function() {
                checkExportAction();
            })

            function checkExportAction() {
                var selectedIds = [];
                $('.handleExportDumpValue').each(function() {
                    if ($(this).is(':checked')) {
                        selectedIds.push($(this).val());
                    }
                })
                if (selectedIds.length > 0) {
                    $('.exportExcelBtn').removeClass('hidden')
                    $('.selectedIdsInput').val(selectedIds.join(','));
                } else {
                    $('.exportExcelBtn').addClass('hidden')
                    $('.selectedIdsInput').val('');
                }
            }
        </script>
    @endpush

</div>
