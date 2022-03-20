<?php

namespace App\Http\Controllers;

use App\Libraries\API;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tutoriales()
    {
        $api = new API;
        $groups = $api->get('tutoriales');
        return view('help.tutoriales', compact(['groups']));
    }

    public function faqs()
    {
        $api = new API;
        $groups = $api->get('faqs');
        return view('help.faqs', compact(['groups']));
    }

    public function faq($id)
    {
        $api = new API;
        $faq = $api->get('faqs/ver/' . $id);
        return view('help.faq', compact(['faq']));
    }

    public function tutorial($id)
    {
        $api = new API;
        $tutorial = $api->get('tutoriales/ver/' . $id);
        return view('help.tutorial', compact(['tutorial']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
