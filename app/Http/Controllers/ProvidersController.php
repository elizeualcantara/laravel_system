<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Hour;
use Illuminate\Support\Facades\DB;

class ProvidersController extends Controller
{

    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', [
            'providers' => $providers,
        ]);
    }

    public function indexReports()
    {
        return view('providers.reports');
    }

    public function indexFiltering(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($request->query('provider'))) {
            $providers = Provider::where('providers.id', $request->query('provider'))->paginate(20)->withQueryString();
            return view('providers.index')->with('providers', $providers)->with('filter', $filter);
        } elseif (!empty($request->query('period'))) {
            $providers = Provider::join('hours', 'providers.id', '=', 'hours.provider_id')
                ->where('hours.start', $request->query('period'))->paginate(20)->withQueryString();
            return view('providers.index')->with('providers', $providers)->with('filter', $filter);
        } else {
            $providers = DB::table('providers as v1')
                ->select(DB::raw(' v1.*, (SELECT SUM(hours) FROM hours as v2 WHERE v2.provider_id=v1.id) as total '))
                ->paginate(20)->withQueryString();
            //$providers = Provider::where('providers.name', 'like', '%' . $filter . '%')->paginate(20)->withQueryString();
            return view('providers.index')->with('providers', $providers)->with('filter', $filter);
        }
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:providers|max:255',
            'telefone' => 'required|min:8|max:255',
            'cpf_cnpj' => 'required|min:11|max:255'
        ], [
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'Email é obrigatório',
            'telefone.required' => 'Telefone é obrigatório',
            'cpf_cnpj.required' => 'CPF ou CNPJ é obrigatório'
        ]);

        $newProviders = new Provider();
        $newProviders->name = request('name');
        $newProviders->email = request('email');
        $newProviders->telefone = request('telefone');
        $newProviders->cpf_cnpj = request('cpf_cnpj');
        $newProviders->save();
        return redirect('/providers')->with('mssg', 'Prestador de Serviço criado com sucesso');
    }

    public function show($id)
    {
        $employee = Hour::all()->where('provider_id', $id);
        $count = 0;
        foreach ($employee  as $value) {
            if (isset($value->hours))
                $count += $value->hours;
        }

        $provider = Provider::findOrFail($id);
        return view('providers.show', ['provider' => $provider, 'count' => $count]);
    }

    public function destroy($id)
    {
        $hour = Provider::findOrFail($id);
        $hour->delete();
        return redirect('/providers');
    }
}