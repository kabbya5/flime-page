<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bibliograpy;
use Illuminate\Http\Request;

class BibliograpyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bibliograpies = Bibliograpy::paginate(30);
        return view('backend.bibliograpy.index',compact('bibliograpies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bibliograpy = new Bibliograpy();
        return view('backend.bibliograpy.create',compact('bibliograpy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'পুস্তকের_ধরণ' => 'required',
            'বইয়ের_নাম' => 'required',
            'লেখকের_নাম' => 'required',
            'প্রথম_প্রকাশ' => 'required',
            'জমাদানের_তারিখ' => 'required',
            'প্রকাশকের_নাম_ও_ঠিকানা' => 'required',
        ]);

        $data = $request->all();
        Bibliograpy::create($data);

        return back()->with('message', 'The bibliograpy post has been created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bibliograpy  $bibliograpy
     * @return \Illuminate\Http\Response
     */
    public function show(Bibliograpy $bibliograpy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bibliograpy  $bibliograpy
     * @return \Illuminate\Http\Response
     */
    public function edit(Bibliograpy $bibliograpy)
    {
        return view('backend.bibliograpy.edit',compact('bibliograpy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bibliograpy  $bibliograpy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bibliograpy $bibliograpy)
    {
        $request->validate([
            'পুস্তকের_ধরণ' => 'required',
            'বইয়ের_নাম' => 'required',
            'লেখকের_নাম' => 'required',
            'প্রথম_প্রকাশ' => 'required',
            'জমাদানের_তারিখ' => 'required',
            'প্রকাশকের_নাম_ও_ঠিকানা' => 'required',
        ]);

        $data = $request->all();
        $bibliograpy->update($data);

        return redirect()->route('admin.bibliograpy.index')->with('message', 'The bibliograpy post has been updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bibliograpy  $bibliograpy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bibliograpy $bibliograpy)
    {
        $bibliograpy->delete();
        return back()->with('message', "The bibliograpy has been deleted successfully");
    }
}
