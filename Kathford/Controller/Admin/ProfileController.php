<?php

namespace Kathford\Controller\Admin;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kathford\Services\ProfileService;

class ProfileController extends Controller
{

    protected ProfileService $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

     /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
      */

    public function index(Request $request)
    {
       $data = [];
      return view('admin.profile.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        return view($this->view_path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return Application|Factory|View
     */

    public function show($id)
    {
        $data = [];
        $data['row'] = $id;
        return view($this->view_path.'.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */

    public function edit($id)
    {
        $data = [];
        $data['row'] = $id;
        return view($this->view_path.'.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return void
     */

    public function update(Request $request, $id)
    {
        //
    }

      /**
      * Remove the specified resource from storage.
      *
      * @param $model
      * @return RedirectResponse
      * @throws Exception
      */

    public function destroy( $model )
    {
        $model->delete();
        return redirect()->back();
    }
}
