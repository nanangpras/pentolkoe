<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\ClientCompanyService;
use Illuminate\Http\Request;

class ClientCompanyController extends Controller
{
    protected $clientCompService;

    public function __construct(ClientCompanyService $clientCompService)
    {
        $this->clientCompService = $clientCompService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = $this->clientCompService->getAll();
        return view('admin.pages.clients.data',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->clientCompService->save($request);
        return redirect()->route('client-company.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editClient = $this->clientCompService->getById($id);
        return view('admin.pages.clients.edit',compact('editClient'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->clientCompService->update($request,$id);
        return redirect()->route('client-company.index')->with('success','Update berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->clientCompService->delete($id);
        return redirect()->route('client-company.index')->with('success','Data berhasil dihapus');
    }
}
