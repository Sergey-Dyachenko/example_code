<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\OutputFormatInterface;
use App\Models\Client;
use App\Services\ServiceInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    protected $service;
    protected $formatter;

    public function __construct(ServiceInterface $service, OutputFormatInterface $formatter)
    {
        $this->service = $service;
        $this->formatter = $formatter;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/clients",
     *     @OA\Response(response="200", description="Display a listing of clients.")
     * )
     */

    /**
     * @SWG\Get(
     *     path="/api/clients",
     *     summary="Get list of clients",
     *     tags={"clients"},
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/User")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="User not found",
     *     )
     * )
     */
    public function index()
    {
        return $this->formatter->outputFormat($this->service->all());

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
    /**
     * @OA\Get(
     *     path="/api/clients/{id}",
     *     @OA\Response(response="200", description="Display a listing of clients.")
     * )
     */
    /**
     * @SWG\Get(
     *     path="/api/clients/{id}",
     *     summary="Get User",
     *     tags={"clients"},
     *      @SWG\Parameter(
     *         name="id",
     *         in="body",
     *         description="User id",
     *         required=true,
     *         type="integer",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/User")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="401",
     *         description="Unauthorized user",
     *     ),
     * )
     */

    public function show($id)
    {
        return $this->formatter->outputFormat($this->service->find($id));
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
        return $this->formatter->outputFormat($this->service->update($request->all() ,$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->formatter->outputFormat($this->service->delete($id));
    }


    public function getCountAll()
    {
       return $this->formatter->outputFormat($this->service->countAll());
    }
}
