<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MailTemplate;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'mail_templates';
        $data['pageTitle'] = 'Admin';
        $data['mail_list'] = MailTemplate::get();

        return view('backend.mailtemplate.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.mailtemplate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $template_arr = $request->all();
        $passing_data = Helper::mail_store($template_arr);
        if ($passing_data) {
            return redirect('admin/mail_templates')->with(['success' => 'Data successfully inserted']);
        } else {
            return redirect('admin/mail_templates')->with(['failure' => 'Something went wrong']);
        }

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
    public function edit($id)
    {
        $mail_list_edit = Helper::mail_template_edit($id);

        return view('backend.mailtemplate.edit', ['mail_template' => $mail_list_edit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
