<?php

namespace App\View\Components;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopHeader extends Component
{
    public array $tableManagement;
    public string $createRoute;
    public string $module;
    public string $import;
    public string $createCanvas;
    public string $emitFunc;
    public string $routeParam;
    public string $onclickFunc;
    public string $headerText;
    public bool $multiDeactivateBtn;
    public bool $showFilter;
    public string $showLeakAddButton;
    public string $lastRecordTime;
    public array $lastLogData;

    private const TABLES = [
        'admin::client.index' => 'customers-table',
        'admin::bom.index' => 'bom-data-table',
        'admin::costing-sheet.index' => 'costing-sheets-table',
        'admin::vendor.index' => 'vendors-table',
        'admin::product-master.index' => 'parts-table',
        'admin::rm-master.index' => 'rm-table',
        'admin::machine-master.index' => 'machines-table',
        'admin::labour-master.index' => 'labours-table',
        'admin::labour.index' => 'labours-table',
        'admin::line-master.index' => 'lineMaster-table',
        'admin::reports.rm.summary' => 'report-dataTable',
        'admin::reports.rm.transactions' => 'report-dataTable',
        'admin::reports.wip' => 'report-dataTable',
        'admin::reports.finishGood' => 'report-dataTable',
        'store::rm.index' => 'rm-store-table',
        'store::rm.transactions' => 'transactions-table',
        'store::wip.index' => 'wip-table',
        'store::finish-good.index' => 'finish-good-table',
        'admin::gage-report.index' => 'gage-report-table',
        'admin::gage-report.calibration' => 'calibration-report-table',
        'admin::project.index' => 'project-table',
        'admin::sample-submission.sampleSubmissionList' => 'project-table',
        'admin::gage.index' => 'project-table',
        'admin::gage-master.index' => 'gage-master-table',
        'admin::plan-production.index' => 'plan-production-table',
        'admin::schedule.index' => 'schedules-table',
        'admin::schedule.partWise' => 'parts-insights-table',
        'admin::schedule.rmWise' => 'rm-insights-datatable',
        'admin::getProductionOrder.index' => 'production-order-table',
        'npd::accounts.index' => 'accounts-table',
        'npd::contacts.index' => 'contacts-table',
        'npd::leads.index' => 'leads-table',
        'npd::vendors.index' => 'npd-vendors-table',
        'npd::parts.index' => 'parts-table',
        'npd::quotations.index' => 'quotations-table',
        'npd::rm.index' => 'npd-rm-table',
        'part.index' => 'leak-part-table',
        'vendor.index' => 'leak-vendor-table',
        'shift.index' => 'leak-shift-table',
        'line.index' => 'leak-line-table',
        'customer.index' => 'leak-customer-table',
        'quality-assurance::customer-complaint.index' => 'complaints-table',
        'quality-assurance::capa.index' => 'capa-table',
    ];

    public function __construct(
        array $tableManagement = [],
        string $module = '',
        string $createRoute = '',
        string $createCanvas = '',
        string $emitFunc = '',
        string $routeParam = '',
        string $import = '',
        string $onclickFunc = '',
        bool $multiDeactivateBtn = false,
        bool $showFilter = false,
        $showLeakAddButton = '',
        $lastRecordTime = '',
        $lastLogData=[]
    ) {
        foreach (get_defined_vars() as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function render(): View|Closure|string
    {

        $routeName = \Request::route()->getName();
        $listingTableId = $this->getTableId($routeName);

        $this->showHeaderTxt($routeName);

        return view('components.top-header', compact('listingTableId', 'routeName'));
    }

    private function getTableId(string $routeName): string
    {
        return self::TABLES[$routeName] ?? 'data-table';
    }

    private function showHeaderTxt($routeName)
    {
        if (\Str::startsWith($routeName, 'admin::schedule.')):
            $selectedMonth = request()->month ?? date('m');
            $selectedYear = request()->year ?? date('Y');
            $this->headerText = Carbon::createFromFormat('Y-m', $selectedYear . '-' . $selectedMonth)->format('F Y');
        else:
            $this->headerText = '';
        endif;

    }
}
