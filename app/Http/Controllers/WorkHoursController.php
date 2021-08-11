<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;
use App\Models\Provider;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class WorkHoursController extends Controller
{
    public function index()
    {
        $hours = Hour::join('providers', 'hours.provider_id', '=', 'providers.id')
            ->get(['providers.*', 'hours.*']);
        return view('employees.index', [
            'hours' => $hours,
        ]);
    }

    public function indexFiltering(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($request->query('provider'))) {
            $hours = Hour::join('providers', 'hours.provider_id', '=', 'providers.id')
                ->where('providers.id', $request->query('provider'))->paginate(20)->withQueryString();
            return view('employees.index')->with('hours', $hours)->with('filter', $filter);
        } elseif (!empty($request->query('period'))) {
            $hours = Hour::join('providers', 'hours.provider_id', '=', 'providers.id')
                ->where('hours.start', $request->query('period'))->paginate(20)->withQueryString();
            return view('employees.index')->with('hours', $hours)->with('filter', $filter);
        } else {
            $hours = Hour::join('providers', 'hours.provider_id', '=', 'providers.id')
                ->where('providers.name', 'like', '%' . $filter . '%')->paginate(20)->withQueryString();
            return view('employees.index')->with('hours', $hours)->with('filter', $filter);
        }
    }

    public function create()
    {
        $providers  = Provider::all();
        return view('employees.create', compact('providers'));
    }

    public function createProvider($id)
    {
        $provider = Provider::findOrFail($id);
        return view('employees.createProvider', ['provider' => $provider]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'hours' => 'required|max:5',
            'start' => 'required'
        ], [
            'hours.required' => 'Quantidade de Horas é obrigatório',
            'start.required' => 'Selecione a semana'
        ]);

        $newEmployeeHours = new Hour();
        $newEmployeeHours->provider_id = request('provider_id');
        $newEmployeeHours->hours = request('hours');
        $newEmployeeHours->start = request('start');
        $newEmployeeHours->save();
        return redirect('/providers/' . request('provider_id'))->with('mssg', 'Horas lançadas com sucesso');
    }

    public function show($id)
    {
        $employee = Hour::findOrFail($id);
        return view('employees.show', ['employee' => $employee]);
    }

    public function showAllFromEmployeeOld($id)
    {
        $employee = Hour::all()->where('provider_id', $id);
        $provider = Provider::findOrFail($id);
        $count = 0;
        foreach ($employee  as $value) {
            if (isset($value->hours))
                $count += $value->hours;
        }
        return view('employees.showAllOfEmployee', ['employee' => $employee, 'provider' => $provider, 'count' => $count]);
    }

    public function showAllFromEmployee($id)
    {
        $provider = Provider::findOrFail($id);
        $hours = DB::table('hours')
            ->select('start', DB::raw('sum(hours) as total'))
            ->where('provider_id', $id)
            ->groupBy('start')
            ->orderBy('start')
            ->get();

        $periods = [];
        foreach ($hours as $value) {
            if (!in_array($value->start, $periods)) {
                array_push($periods, $value->start);
            }
        }
        $count = 0;
        foreach ($hours  as $value) {
            if (isset($value->total))
                $count += $value->total;
        }

        return view('employees.showAllOfEmployee', ['hours' => $hours, 'count' => $count, 'periods' => $periods, 'provider' => $provider]);
    }


    public function showAllHoursFromEmployee($id)
    {
        $employee = Hour::all()->where('provider_id', $id);
        $count = 0;
        foreach ($employee  as $value) {
            if (isset($value->hours))
                $count += $value->hours;
        }
        return $count;
    }

    public function createPDF($id)
    {
        $employee = Hour::join('providers', 'hours.provider_id', '=', 'providers.id')
            ->get(['providers.*', 'hours.*'])
            ->where('provider_id', $id);

        $count = 0;
        $name = $employee->first()->name;
        foreach ($employee  as $value) {
            if (isset($value->hours))
                $count += $value->hours;
        }
        $pdf = PDF::loadview('employees.createPDF', ['employee' => $employee, 'count' => $count]);
        return $pdf->stream("$name.pdf");
    }

    public function indexAllHours()
    {
        $hours = DB::table('hours')
            ->select('start', DB::raw('sum(hours) as total'))
            ->groupBy('start')
            ->orderBy('start')
            ->get();

        $periods = [];
        foreach ($hours as $value) {
            if (!in_array($value->start, $periods)) {
                array_push($periods, $value->start);
            }
        }
        $count = 0;
        foreach ($hours  as $value) {
            if (isset($value->hours))
                $count += $value->hours;
        }
        return view('employees.indexTotalHours', ['hours' => $hours, 'count' => $count, 'periods' => $periods]);
    }

    public function showPeriodHours($period)
    {
        $allPeriods = Hour::all()->where('start', $period);

        $count = 0;

        foreach ($allPeriods as $value) {
            if (isset($value->hours)) {
                $count += $value->hours;
            }
        }

        return view('employees.showHoursPerPeriod', ['allPeriods' => $allPeriods, 'count' => $count,]);
    }

    public function destroy($id)
    {
        $hour = Hour::findOrFail($id);
        $hour->delete();

        return redirect('/employees');
    }
}