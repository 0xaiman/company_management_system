<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'website_url' => 'required|url',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ]);

        if($request->hasFile('logo')){
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Company::create($validated);

        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'website_url' => 'required|url',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'remove_logo' => 'nullable|boolean',
        ]);
    
        if ($request->has('remove_logo') && $request->boolean('remove_logo')) {
            if ($company->logo && !Str::startsWith($company->logo, 'http')) {
                $oldLogoPath = storage_path('app/public/' . $company->logo);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
            $validated['logo'] = null; 
        }
    
        if ($request->hasFile('logo')) {
            if ($company->logo && !Str::startsWith($company->logo, 'http')) {
                $oldLogoPath = storage_path('app/public/' . $company->logo);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }
    
        $company->update($validated);
    
        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if ($company->logo && !Str::startsWith($company->logo, 'http')) {
        $logoPath = storage_path('app/public/' . $company->logo);
        if (file_exists($logoPath)) {
            unlink($logoPath);
        }
    }

    $company->delete();

    return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
        
    }

}
