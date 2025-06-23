<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Application $application)
    {
        $datas = Data::where('application_id', $application->id)->get();

        return view('data.data-index', compact('datas'), [
            'title' => 'Data Informasi Aplikasi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Application $application)
    {
        return view('data.data-create', compact('application'), [
            'title' => 'Data Informasi Aplikasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newData = Data::create($validated);
        });

        return redirect()->route('admin.application.show', $request->application_id)->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application, Data $data)
    {
        return view('data.data-edit', compact('application', 'data'), [
            'title' => 'Data Informasi Aplikasi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Application $application, UpdateDataRequest $request, Data $data)
    {
        DB::transaction(function () use ($request, $data) {
            $validated = $request->validated();

            $data->update($validated);
        });

        return redirect()->route('admin.application.show', $request->application_id)->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application, Data $data)
    {
        DB::transaction(function () use ($data) {

            $data->delete();
        });

        return redirect()->route('admin.application.show', $application->id)->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
