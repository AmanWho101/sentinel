<?php

namespace App\Http\Controllers\Admin\Createfile;

use App\Http\Requests;
use App\Http\Requests\Createfile\CreateCreatefileRequest;
use App\Http\Requests\Createfile\UpdateCreatefileRequest;
use App\Repositories\Createfile\CreatefileRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Createfile\Createfile;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CreatefileController extends InfyOmBaseController
{
    /** @var  CreatefileRepository */
    private $createfileRepository;

    public function __construct(CreatefileRepository $createfileRepo)
    {
        $this->createfileRepository = $createfileRepo;
    }

    /**
     * Display a listing of the Createfile.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->createfileRepository->pushCriteria(new RequestCriteria($request));
        $createfiles = $this->createfileRepository->all();
        return view('admin.createfile.createfiles.index')
            ->with('createfiles', $createfiles);
    }

    /**
     * Show the form for creating a new Createfile.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.createfile.createfiles.create');
    }

    /**
     * Store a newly created Createfile in storage.
     *
     * @param CreateCreatefileRequest $request
     *
     * @return Response
     */
    public function store(CreateCreatefileRequest $request)
    {
        $input = $request->all();
        Storage::disk('local');
        //dd($request->hasFile('path'));
        if($request->hasFile('path')){
            $destination_path = 'public/file';
            $file = $request->file('path');
            $path_name = $file->getClientOriginalName();
            $path = $request->file('path')->storeAs($destination_path,$path_name);
            
            $input['path'] = $path_name;
           //dd($file);
            $createfile = $this->createfileRepository->create($input);
            Flash::success('Createfile saved successfully.');

        return redirect(route('admin.createfile.createfiles.index'));
        }else
        {
            Flash::error('file couldnt be uploded');
            return redirect(route('admin.createfile.createfiles.create'));
        }
       
       
        
    }

    /**
     * Display the specified Createfile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $createfile = $this->createfileRepository->findWithoutFail($id);

        if (empty($createfile)) {
            Flash::error('Createfile not found');

            return redirect(route('createfiles.index'));
        }

        return view('admin.createfile.createfiles.show')->with('createfile', $createfile);
    }

    /**
     * Show the form for editing the specified Createfile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $createfile = $this->createfileRepository->findWithoutFail($id);

        if (empty($createfile)) {
            Flash::error('Createfile not found');

            return redirect(route('createfiles.index'));
        }

        return view('admin.createfile.createfiles.edit')->with('createfile', $createfile);
    }

    /**
     * Update the specified Createfile in storage.
     *
     * @param  int              $id
     * @param UpdateCreatefileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCreatefileRequest $request)
    {
        $createfile = $this->createfileRepository->findWithoutFail($id);

        

        if (empty($createfile)) {
            Flash::error('Createfile not found');

            return redirect(route('createfiles.index'));
        }

        $createfile = $this->createfileRepository->update($request->all(), $id);

        Flash::success('Createfile updated successfully.');

        return redirect(route('admin.createfile.createfiles.index'));
    }

    /**
     * Remove the specified Createfile from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.createfile.createfiles.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Createfile::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.createfile.createfiles.index'))->with('success', Lang::get('message.success.delete'));

       }

}
