<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = new Company();
        $sectors = Sector::all();
        return view('admin.companies.create', compact('company', 'sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'business_name' => 'required|string|min:1|max:100',
                'status' => 'required|string|min:1|max:20',
                'sector' => 'nullable|exists:sectors,id',
                'vat_number' => 'required|string|unique:companies|min:11|max:11',
                'address' => 'required|string|max:100',
                'tax_id_code' => 'required|string|min:16|max:16',
                'activity_start_date' => 'required|string',
                'rating' => 'required|string|max:1',
                'chamber_of_commerce' => 'nullable|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
                'notes' => 'nullable|string',
                'email' => 'required|string|max:70',
                'phone_number' => 'required|string|max:20',
                'username' => 'required|string|min:3|max:50',
                'password' => 'required|string|max:30',
            ]
        );

        $data = $request->all();
        $company = new Company();

        if (Arr::exists($data, 'chamber_of_commerce')) {
            $chamber_of_commerce = Storage::put('companies', $data['chamber_of_commerce']);
            $data['chamber_of_commerce'] = $chamber_of_commerce;
        }

        $company->fill($data);
        $company->save();

        // make a relation between companies and sectors
        if (Arr::exists($data, 'sectors')) $company->sectors()->attach($data['sectors']);

        return to_route('admin.companies.show', $company->id)->with('type', 'success')->with('msg', 'Azienda inserita con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $sectors = Sector::all();
        $company_sectors = $company->sectors->pluck('id')->toArray();
        return view('admin.companies.edit', compact('company', 'sectors', 'company_sectors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate(
            [
                'business_name' => 'required|string|min:1|max:100',
                'status' => 'required|string|min:1|max:20',
                'sector' => 'nullable|exists:sectors,id',
                'vat_number' => ['required', 'string', Rule::unique('companies')->ignore($company->id), 'min:11', 'max:11'],
                'address' => 'required|string|max:100',
                'tax_id_code' => 'required|string|min:16|max:16',
                'activity_start_date' => 'required|string',
                'rating' => 'required|string|max:1',
                'chamber_of_commerce' => 'nullable|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
                'notes' => 'nullable|string',
                'email' => 'required|string|max:70',
                'phone_number' => 'required|string|max:20',
                'username' => 'required|string|min:3|max:50',
                'password' => 'required|string|max:30',
            ]
        );

        $data = $request->all();

        if (Arr::exists($data, 'chamber_of_commerce')) {
            if ($company->chamber_of_commerce) Storage::delete($company->chamber_of_commerce);
            $chamber_of_commerce = Storage::put('companies', $data['chamber_of_commerce']);
            $data['chamber_of_commerce'] = $chamber_of_commerce;
        }

        $company->fill($data);
        $company->save();

        // assigning sectors
        if (Arr::exists($data, 'sectors')) $company->sectors()->sync($data['sectors']);
        else if (count($company->sectors)) $company->sectors()->detach();

        return to_route('admin.companies.show', $company->id)->with('type', 'warning')->with('msg', 'Modifica avvenuta con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if ($company->chamber_of_commerce) Storage::delete($company->chamber_of_commerce);
        if (count($company->sectors)) $company->sectors()->detach();

        $company->delete();

        return to_route('admin.companies.index')->with('type', 'danger')->with('msg', "L'azienda $company->business_name è stata cancellata con successo.");
    }
}
